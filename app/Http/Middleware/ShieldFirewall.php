<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\BlockedIp;

class ShieldFirewall
{
    /**
     * WAF (Web Application Firewall) & Auto-Block Interceptor
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        // 1. CEK STATUS BLACKLIST IP
        // Kita gunakan Cache (60 detik) agar aplikasi tetap super cepat dan tidak membebani database setiap kali user klik halaman.
        $isBlocked = cache()->remember("blocked_ip_{$ip}", 60, function () use ($ip) {
            return BlockedIp::where('ip_address', $ip)->exists();
        });

        // Jika IP-nya ada di tabel blocked_ips, langsung tolak mentah-mentah!
        if ($isBlocked) {
            abort(403, 'ACCESS DENIED: Your IP Address has been banned from this server due to suspicious activities.');
        }

        // 2. DETEKSI SQL INJECTION & XSS (Berdasarkan Pola Input)
        $input = $request->all();
        if ($this->containsMaliciousPayload($input)) {
            // Optional: Jika ingin, Anda bisa uncomment kode di bawah untuk OTOMATIS nge-banned IP mereka saat ketahuan menyerang

            BlockedIp::firstOrCreate(
                ['ip_address' => $ip],
                ['reason' => 'Malicious Payload Detected (WAF Auto-Ban)']
            );

            abort(403, 'SHIELD WAF: Malicious payload detected. Your request has been blocked.');
        }

        return $next($request);
    }

    /**
     * Fungsi Pemindai Karakter Berbahaya
     */
    private function containsMaliciousPayload($data): bool
    {
        if (is_array($data)) {
            foreach ($data as $value) {
                if ($this->containsMaliciousPayload($value)) {
                    return true;
                }
            }
            return false;
        }

        if (is_string($data)) {
            // Pola (Regex) kotor yang paling sering dipakai Hacker pemula hingga menengah
            $patterns = [
                '/<script\b[^>]*>(.*?)<\/script>/is', // XSS Basic
                '/javascript:/i',                     // XSS Link
                '/onload=/i',                         // XSS Event
                '/onerror=/i',                        // XSS Event
                '/UNION\s+SELECT/i',                  // SQL Injection
                '/OR\s+1\s*=\s*1/i',                  // SQL Auth Bypass
                '/DROP\s+TABLE/i',                    // SQL Destructive
            ];

            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $data)) {
                    return true;
                }
            }
        }

        return false;
    }
}
