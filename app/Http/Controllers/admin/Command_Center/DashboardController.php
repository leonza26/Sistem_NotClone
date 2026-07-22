<?php

namespace App\Http\Controllers\admin\Command_Center;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. DATA PENGGUNA & WORKSPACE (Tarik langsung dari Database)
        $totalUsers = User::count();
        $newUsersThisWeek = User::where('created_at', '>=', now()->subWeek())->count();
        // Hitung persentase pertumbuhan (cegah error dibagi nol)
        $userGrowth = $totalUsers > 0 ? round(($newUsersThisWeek / $totalUsers) * 100) : 0;
        $totalWorkspaces = Workspace::count();
        $newWorkspacesToday = Workspace::whereDate('created_at', today())->count();
        // 2. TOTAL STORAGE (Scanner Folder Fisik Server)
        $storagePath = storage_path('app/public');
        $storageSize = 0;
        if (File::exists($storagePath)) {
            // Looping semua file di dalam storage public dan hitung total ukurannya (dalam bytes)
            foreach (File::allFiles($storagePath) as $file) {
                $storageSize += $file->getSize();
            }
        }
        $formattedStorage = $this->formatBytes($storageSize);
        // 3. SYSTEM HEALTH (Uji Latensi Database / Ping)
        $healthStart = microtime(true);
        try {
            DB::connection()->getPdo(); // Coba hubungi database
            $latency = round((microtime(true) - $healthStart) * 1000); // Hitung kecepatan balasan dalam milidetik (ms)

            // Logika Status: Jika balasan di bawah 100ms, server sangat sehat
            $healthStatus = $latency < 100 ? '99.9%' : '95.0%';
            $healthLabel = $latency < 100 ? 'Optimal' : 'Degraded';
            $healthColor = $latency < 100 ? 'emerald' : 'yellow';
        } catch (\Exception $e) {
            // Jika database mati/terputus
            $healthStatus = '0%';
            $healthLabel = 'Critical';
            $healthColor = 'red';
        }
        $metrics = [
            'total_users' => $totalUsers,
            'user_growth' => "+{$userGrowth}% this week",
            'active_workspaces' => $totalWorkspaces,
            'workspace_growth' => "+{$newWorkspacesToday} today",
            'total_storage' => $formattedStorage,
            'system_health' => $healthStatus,
            'health_label' => $healthLabel,
            'health_color' => $healthColor,
        ];
        // 4. RECENT ACTIVITY (Menggabungkan Log User Baru & Workspace Baru)
        $recentUsers = User::latest()->take(5)->get()->map(function ($user) {
            return [
                'icon' => 'person_add',
                'color' => 'blue',
                'title' => 'New User Registered',
                'desc' => "{$user->email} joined",
                'time' => $user->created_at
            ];
        });
        // Hati-hati, kita butuh relasi 'user' agar tahu siapa pembuat workspacenya
        $recentWorkspaces = Workspace::with('users')->latest()->take(5)->get()->map(function ($ws) {
            return [
                'icon' => 'add_business',
                'color' => 'emerald',
                'title' => 'Workspace Created',
                'desc' => "\"{$ws->name}\" by " . ($ws->user->name ?? 'Unknown'),
                'time' => $ws->created_at
            ];
        });
        // Gabungkan kedua data aktivitas di atas, urutkan dari yang paling baru, lalu potong jadi 5 saja
        $recentActivities = $recentUsers->concat($recentWorkspaces)->sortByDesc('time')->take(5);
        return view('admin.dashboard', compact('metrics', 'recentActivities'));
    }
    /**
     * Konversi ukuran Bytes (angka panjang) ke MB / GB agar mudah dibaca manusia
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
