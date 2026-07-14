<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Logout;
use Illuminate\Events\Dispatcher;
use App\Models\LoginLog;
use App\Models\BlockedIp;
use Stevebauman\Location\Facades\Location;

class AuthEventSubscriber
{
    /**
     * Fungsi utama untuk mencatat log ke database & Auto-Banned
     */
    private function logEvent($event, $type, $email = null)
    {
        $request = request();
        $ip = $request->ip();

        // Melacak Geolocation (Negara/Kota) berdasarkan IP
        $position = Location::get($ip);
        $locationStr = $position ? $position->cityName . ', ' . $position->countryName : 'Unknown / Localhost';

        // Rekam Jejak
        LoginLog::create([
            'user_id' => isset($event->user) ? $event->user->id : null,
            'email' => $email ?? (isset($event->credentials['email']) ? $event->credentials['email'] : 'Unknown'),
            'ip_address' => $ip,
            'user_agent' => $request->userAgent(),
            'event_type' => $type,
            'location' => $locationStr,
        ]);

        // 🚨 SISTEM PERTAHANAN BRUTE FORCE (AUTO-BLOCK IP)
        if ($type === 'failed') {
            // Hitung berapa kali IP ini gagal login dalam 5 menit terakhir
            $failedCount = LoginLog::where('ip_address', $ip)
                ->where('event_type', 'failed')
                ->where('created_at', '>=', now()->subMinutes(5))
                ->count();

            // Jika mencapai 5 kali gagal berturut-turut, BLACKLIST IP-nya!
            if ($failedCount >= 5) {
                BlockedIp::firstOrCreate(
                    ['ip_address' => $ip],
                    ['reason' => 'Brute Force Detected (>5 failed attempts in 5 mins)']
                );
            }
        }
    }

    // Pendeteksi saat Login Sukses
    public function handleUserLogin(Login $event)
    {
        $this->logEvent($event, 'login', $event->user->email);
    }

    // Pendeteksi saat Logout
    public function handleUserLogout(Logout $event)
    {
        $this->logEvent($event, 'logout', $event->user->email);
    }

    // Pendeteksi saat Login Gagal (Salah Password/Email)
    public function handleUserFailedLogin(Failed $event)
    {
        $this->logEvent($event, 'failed', $event->credentials['email'] ?? null);
    }

    /**
     * Mendaftarkan semua penyadap event ke sistem Laravel
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
            Failed::class => 'handleUserFailedLogin',
        ];
    }
}
