@extends('layouts.superadmin')
@section('title', 'Shield & Security')
@section('header_title', 'Shield & Security')

@section('content')
    <div class="p-8 max-w-7xl mx-auto space-y-8">

        <!-- BAGIAN 1: THREAT DETECTIONS (BLOCKED IPs) -->
        <div
            class="bg-white rounded-2xl border border-red-100 shadow-[0_2px_15px_-3px_rgba(239,68,68,0.1)] overflow-hidden">
            <div class="p-6 border-b border-red-50 bg-red-50/30 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined text-[20px]">gpp_bad</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-outfit font-semibold text-slate-800">Active Threats Blocked</h2>
                        <p class="text-xs text-slate-500 mt-0.5">IP Addresses currently banned by WAF</p>
                    </div>
                </div>
                <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-bold">{{ $blockedIps->count() }}
                    IPs Banned</span>
            </div>

            <div class="p-6">
                @if($blockedIps->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($blockedIps as $bip)
                            <div class="flex items-center justify-between p-4 border border-slate-100 rounded-xl bg-slate-50/50">
                                <div>
                                    <h4 class="font-mono text-sm font-bold text-slate-700">{{ $bip->ip_address }}</h4>
                                    <p class="text-[11px] text-red-500 font-medium mt-1">{{ $bip->reason }}</p>
                                    <p class="text-[10px] text-slate-400 mt-1">Banned: {{ $bip->blocked_at->diffForHumans() }}</p>
                                </div>
                                <form action="{{ route('admin.security.unblock', $bip->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 bg-white border border-slate-200 text-slate-600 text-xs font-semibold rounded-lg hover:bg-slate-50 hover:text-emerald-600 transition-colors shadow-sm">
                                        Pardon
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <span class="material-symbols-outlined text-4xl text-emerald-300 mb-3">verified_user</span>
                        <p class="text-sm font-medium text-slate-500">No threats detected. Your walls are secure.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- BAGIAN 2: ACTIVE SESSIONS (REAL-TIME) -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-500">
                    <span class="material-symbols-outlined text-[20px]">sensors</span>
                </div>
                <div>
                    <h2 class="text-lg font-outfit font-semibold text-slate-800">Live Active Sessions</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Users currently connected to Flowral</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-medium">
                            <th class="py-3 px-6">User</th>
                            <th class="py-3 px-6">IP Address</th>
                            <th class="py-3 px-6">Browser/Device</th>
                            <th class="py-3 px-6 text-right">Last Active</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($activeSessions as $session)
                            <tr class="hover:bg-slate-50/30 transition-colors">
                                <td class="py-3 px-6">
                                    @if($session->user)
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-7 h-7 rounded-full bg-slate-200 shrink-0 flex items-center justify-center text-[10px] font-bold text-slate-500">
                                                {{ substr($session->user->name, 0, 2) }}
                                            </div>
                                            <span class="text-sm font-medium text-slate-700">{{ $session->user->name }}</span>
                                        </div>
                                    @else
                                        <span class="text-sm text-slate-400 italic">Unknown</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 font-mono text-xs text-slate-600">{{ $session->ip_address }}</td>
                                <td class="py-3 px-6 text-xs text-slate-500 max-w-xs truncate"
                                    title="{{ $session->browser_info }}">{{ $session->browser_info }}</td>
                                <td class="py-3 px-6 text-right text-xs text-slate-500">
                                    <span class="inline-flex items-center gap-1 text-emerald-600"><span
                                            class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        {{ $session->last_active_time }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-sm text-slate-400">No active sessions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- BAGIAN 3: AUDIT TRAIL / LOGIN HISTORY -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div
                class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-500">
                        <span class="material-symbols-outlined text-[20px]">manage_search</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-outfit font-semibold text-slate-800">Authentication Audit Trail</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Historical log of all login attempts</p>
                    </div>
                </div>
                <!-- Filters -->
                <form action="{{ route('admin.security.index') }}" method="GET"
                    class="flex items-center gap-2 w-full md:w-auto">
                    <select name="status"
                        class="py-2 px-3 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        <option value="all">All Events</option>
                        <option value="login" {{ request('status') == 'login' ? 'selected' : '' }}>Login Success</option>
                        <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Login Failed</option>
                        <option value="logout" {{ request('status') == 'logout' ? 'selected' : '' }}>Logout</option>
                    </select>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search IP or Email..."
                        class="py-2 px-3 w-48 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                    <button type="submit"
                        class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium rounded-lg transition-colors">Filter</button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-medium">
                            <th class="py-4 px-6">Timestamp & Event</th>
                            <th class="py-4 px-6">Identifier</th>
                            <th class="py-4 px-6">Location & IP</th>
                            <th class="py-4 px-6">System/Browser</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($loginLogs as $log)
                            <tr class="hover:bg-slate-50/30 transition-colors">
                                <td class="py-4 px-6">
                                    <p class="text-[11px] text-slate-400">{{ $log->created_at->format('M d, Y H:i:s') }}</p>
                                    <div class="mt-1">
                                        @if($log->event_type == 'login')
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700">LOGIN</span>
                                        @elseif($log->event_type == 'failed')
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700">FAILED</span>
                                        @else
                                            <span
                                                class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-600 uppercase">{{ $log->event_type }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-sm font-medium text-slate-700">{{ $log->email }}</p>
                                    @if($log->user)
                                        <p class="text-[10px] text-indigo-500 font-medium mt-0.5">Registered User</p>
                                    @else
                                        <p class="text-[10px] text-slate-400 mt-0.5">Guest/Unknown</p>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[14px] text-slate-400">location_on</span>
                                        <span
                                            class="text-xs font-medium {{ str_contains($log->location, 'Unknown') ? 'text-slate-400' : 'text-slate-700' }}">{{ $log->location }}</span>
                                    </div>
                                    <p class="text-[11px] font-mono text-slate-500 mt-0.5 ml-5">{{ $log->ip_address }}</p>
                                </td>
                                <td class="py-4 px-6 text-[11px] text-slate-500 max-w-[200px] truncate"
                                    title="{{ $log->browser_info  }}">
                                    {{ $log->browser_info  }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-sm text-slate-400">No logs found matching your
                                    criteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($loginLogs->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50/30">
                    {{ $loginLogs->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection