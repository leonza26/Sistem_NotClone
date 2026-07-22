@extends('layouts.superadmin')
@section('title', 'Command Center')
@section('header_title', 'Command Center')

@section('content')

    @php
        // --- KAMUS WARNA DINAMIS (Agar Tailwind membaca class-nya) ---
        $healthColors = [
            'emerald' => [
                'bg_pulse' => 'bg-emerald-500/20',
                'box' => 'bg-emerald-500/20 border-emerald-500/30 text-emerald-400',
                'text' => 'text-emerald-400',
                'dot' => 'bg-emerald-400'
            ],
            'yellow' => [
                'bg_pulse' => 'bg-yellow-500/20',
                'box' => 'bg-yellow-500/20 border-yellow-500/30 text-yellow-400',
                'text' => 'text-yellow-400',
                'dot' => 'bg-yellow-400'
            ],
            'red' => [
                'bg_pulse' => 'bg-red-500/20',
                'box' => 'bg-red-500/20 border-red-500/30 text-red-400',
                'text' => 'text-red-400',
                'dot' => 'bg-red-400'
            ]
        ];
        $hc = $healthColors[$metrics['health_color']] ?? $healthColors['emerald'];

        function getActivityColors($colorName)
        {
            $colors = [
                'blue' => 'bg-blue-50 border-blue-100 text-blue-500',
                'emerald' => 'bg-emerald-50 border-emerald-100 text-emerald-500',
            ];
            return $colors[$colorName] ?? $colors['blue'];
        }
    @endphp

    <div class="p-8 max-w-7xl mx-auto space-y-8">

        <!-- Welcome Section & Quick Action -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-outfit font-semibold text-slate-800 tracking-tight">System Overview</h1>
                <p class="text-slate-500 font-light mt-1">Real-time metrics and system health monitoring.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard.export') }}"
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl font-medium text-sm hover:bg-slate-50 transition-colors flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Generate Report
                </a>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Total Users -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm relative overflow-hidden group hover:border-indigo-200 transition-colors">
                <div
                    class="absolute top-0 right-0 p-6 opacity-5 group-hover:scale-110 group-hover:opacity-10 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-indigo-500">group</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">group</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Users</h3>
                </div>
                <div class="flex items-baseline gap-2 relative z-10">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">
                        {{ number_format($metrics['total_users']) }}
                    </h2>
                    <span
                        class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 uppercase tracking-wider">
                        {{ $metrics['user_growth'] }}
                    </span>
                </div>
            </div>

            <!-- Card 2: Workspaces -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm relative overflow-hidden group hover:border-blue-200 transition-colors">
                <div
                    class="absolute top-0 right-0 p-6 opacity-5 group-hover:scale-110 group-hover:opacity-10 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-blue-500">domain</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 text-blue-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">domain</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Workspaces</h3>
                </div>
                <div class="flex items-baseline gap-2 relative z-10">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">
                        {{ number_format($metrics['active_workspaces']) }}
                    </h2>
                    <span
                        class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 uppercase tracking-wider">
                        {{ $metrics['workspace_growth'] }}
                    </span>
                </div>
            </div>

            <!-- Card 3: Total Storage -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm relative overflow-hidden group hover:border-orange-200 transition-colors">
                <div
                    class="absolute top-0 right-0 p-6 opacity-5 group-hover:scale-110 group-hover:opacity-10 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-orange-500">database</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-orange-50 border border-orange-100 text-orange-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">database</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Storage</h3>
                </div>
                <div class="flex items-baseline gap-2 relative z-10">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">{{ $metrics['total_storage'] }}</h2>
                </div>
            </div>

            <!-- Card 4: System Health (Dinamis dari Ping DB) -->
            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 shadow-xl relative overflow-hidden group">
                <!-- Efek cahaya berkedip sesuai status kesehatan -->
                <div class="absolute -right-10 -top-10 w-32 h-32 blur-3xl rounded-full animate-pulse {{ $hc['bg_pulse'] }}">
                </div>

                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div class="w-10 h-10 rounded-xl border flex items-center justify-center {{ $hc['box'] }}">
                        <span class="material-symbols-outlined text-[20px]">monitor_heart</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-400 uppercase tracking-wider">System Health</h3>
                </div>
                <div class="flex items-baseline gap-2 relative z-10">
                    <h2 class="text-3xl font-outfit font-semibold text-white">{{ $metrics['system_health'] }}</h2>
                    <span
                        class="text-[11px] uppercase tracking-wider font-bold flex items-center gap-1.5 {{ $hc['text'] }}">
                        <span
                            class="w-2 h-2 rounded-full {{ $hc['dot'] }} {{ $metrics['health_label'] === 'Optimal' ? 'animate-pulse' : '' }}"></span>
                        {{ $metrics['health_label'] }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Lower Section: Security Alert & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Live Security Monitor -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-slate-400">shield_person</span>
                        <h2 class="text-lg font-medium text-slate-800">Security & Threat Monitor</h2>
                    </div>
                    <a href="{{ route('admin.security.index') }}"
                        class="text-sm text-teal-600 font-medium hover:text-teal-700">View Full Log &rarr;</a>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-center items-center text-center">
                    <div
                        class="w-16 h-16 rounded-full bg-emerald-50 flex items-center justify-center mb-3 border border-emerald-100 relative">
                        <div class="absolute inset-0 rounded-full border border-emerald-400 animate-ping opacity-50"></div>
                        <span class="material-symbols-outlined text-emerald-500 text-3xl relative z-10">verified_user</span>
                    </div>
                    <h3 class="text-slate-800 font-medium mb-1">Active Protection Enabled</h3>
                    <p class="text-slate-500 text-sm font-light">System firewall is active. Geolocation tracking and rate
                        limiters are currently monitoring all incoming requests.</p>
                </div>
            </div>

            <!-- Recent Admin Activity (Dinamis dari Database) -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-medium text-slate-800">Recent Core Activity</h2>
                </div>
                <div class="p-6">
                    @if($recentActivities->count() > 0)
                        <ul
                            class="space-y-6 relative before:absolute before:inset-0 before:ml-8 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">
                            @foreach($recentActivities as $activity)
                                <li class="relative flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-3 w-full">
                                        <!-- Ikon dengan warna dinamis -->
                                        <div
                                            class="w-8 h-8 rounded-full border flex items-center justify-center shadow-sm z-10 shrink-0 {{ getActivityColors($activity['color']) }}">
                                            <span class="material-symbols-outlined text-[16px]">{{ $activity['icon'] }}</span>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-sm text-slate-700 font-bold truncate">{{ $activity['title'] }}</p>
                                            <p class="text-[11px] text-slate-500 truncate mt-0.5">{{ $activity['desc'] }}</p>
                                        </div>
                                        <span
                                            class="text-[10px] uppercase font-bold text-slate-300 ml-auto shrink-0">{{ \Carbon\Carbon::parse($activity['time'])->diffForHumans(null, true, true) }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-8">
                            <span class="material-symbols-outlined text-slate-200 text-4xl">history</span>
                            <p class="text-sm text-slate-400 mt-2">No recent activity detected.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection