<?php

namespace App\Http\Controllers\admin\Shield_Security;

use App\Http\Controllers\Controller;
use App\Models\BlockedIp;
use App\Models\LoginLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent; // <-- Typo 'unsetse' sudah diperbaiki di sini

class SecurityController extends Controller
{
    public function index(Request $request)
    {
        $agent = new Agent();

        // 1. SESSIONS AKTIF (Siapa yang sedang online detik ini)
        $activeSessionsRaw = DB::table('sessions')->whereNotNull('user_id')->get();
        $activeUserIds = $activeSessionsRaw->pluck('user_id')->unique();
        $activeUsers = User::whereIn('id', $activeUserIds)->get()->keyBy('id');

        $activeSessions = $activeSessionsRaw->map(function ($session) use ($activeUsers, $agent) {
            $session->user = $activeUsers->get($session->user_id);
            $session->last_active_time = Carbon::createFromTimestamp($session->last_activity)->diffForHumans();
            $agent->setUserAgent($session->user_agent);
            $session->browser_info = $agent->browser() . ' on ' . $agent->platform();
            return $session;
        });

        // 2. AUDIT TRAIL / RIWAYAT LOGIN (Dengan Filter)
        $query = LoginLog::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")->orWhere('ip_address', 'like', "%{$search}%");
            });
        }
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('event_type', $request->status);
        }

        $loginLogs = $query->latest()->paginate(10);

        // Setelah data $loginLogs diambil, kita format teks browsernya
        $loginLogs->getCollection()->transform(function ($log) use ($agent) {
            $agent->setUserAgent($log->user_agent);
            $log->browser_info = $agent->browser() . ' on ' . $agent->platform();
            return $log;
        });
        // ----------------------------------------

        // 3. THREAT DETECTIONS (Daftar IP Hacker)
        $blockedIps = BlockedIp::latest()->get();
        return view('admin.security.index', compact('activeSessions', 'loginLogs', 'blockedIps'));
    }

    public function unblockIp(BlockedIp $blockedIp)
    {
        cache()->forget("blocked_ip_{$blockedIp->ip_address}");
        $blockedIp->delete();
        return back()->with('success', "IP Address {$blockedIp->ip_address} has been successfully unblocked (Pardoned).");
    }
}
