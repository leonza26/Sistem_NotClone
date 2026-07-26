<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah tuas Maintenance Mode sedang menyala
        $isMaintenance = Setting::get('maintenance_mode', false);

        if ($isMaintenance) {
            // 2. Jika menyala, cek apakah yang mengakses adalah Super Admin (role == 0)
            $isAdmin = Auth::check() && Auth::user()->role == 0;

            // 3. Jika BUKAN Super Admin, tolak dan tampilkan halaman perbaikan
            if (!$isAdmin) {
                // PENGECUALIAN KRUSIAL: Biarkan halaman Login & Logout tetap terbuka 
                // agar Admin yang sedang tidak login tetap bisa masuk untuk mematikan maintenance!
                if (!$request->is('login') && !$request->is('logout') && !$request->routeIs('login*')) {
                    // Lempar ke halaman cantik dengan kode HTTP 503 (Service Unavailable)
                    return response()->view('errors.maintenance', [], 503);
                }
            }
        }

        return $next($request);
    }
}
