@extends('layouts.superadmin')
@section('title', 'Command Center')
@section('header_title', 'Command Center')

@section('content')
    <div class="p-8 max-w-7xl mx-auto space-y-8">

        <!-- Welcome Section & Quick Action -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-outfit font-semibold text-slate-800 tracking-tight">System Overview</h1>
                <p class="text-slate-500 font-light mt-1">Real-time metrics and system health monitoring.</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl font-medium text-sm hover:bg-slate-50 transition-colors flex items-center gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Generate Report
                </button>
            </div>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 p-6 opacity-10 group-hover:scale-110 group-hover:opacity-20 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-indigo-500">group</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">group</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Users</h3>
                </div>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">{{ $metrics['total_users'] }}</h2>
                    <span
                        class="text-xs font-medium text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">+12%
                        this week</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 p-6 opacity-10 group-hover:scale-110 group-hover:opacity-20 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-blue-500">domain</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 text-blue-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">domain</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Workspaces</h3>
                </div>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">{{ $metrics['active_workspaces'] }}</h2>
                    <span
                        class="text-xs font-medium text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">+3
                        today</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 p-6 opacity-10 group-hover:scale-110 group-hover:opacity-20 transition-all duration-500">
                    <span class="material-symbols-outlined text-[80px] text-orange-500">database</span>
                </div>
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-orange-50 border border-orange-100 text-orange-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">database</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-500 uppercase tracking-wider">Total Storage</h3>
                </div>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-3xl font-outfit font-semibold text-slate-800">{{ $metrics['total_storage'] }}</h2>
                </div>
            </div>

            <!-- Card 4 (System Health) -->
            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 shadow-xl relative overflow-hidden group">
                <!-- Animated background pulse -->
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-500/20 blur-3xl rounded-full animate-pulse">
                </div>

                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[20px]">monitor_heart</span>
                    </div>
                    <h3 class="text-sm font-medium text-slate-400 uppercase tracking-wider">System Health</h3>
                </div>
                <div class="flex items-baseline gap-2 relative z-10">
                    <h2 class="text-3xl font-outfit font-semibold text-white">{{ $metrics['system_health'] }}</h2>
                    <span class="text-xs font-medium text-emerald-400 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Optimal
                    </span>
                </div>
            </div>
        </div>

        <!-- Lower Section: Security Alert & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Live Security Monitor (Preview) -->
            <div
                class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-slate-400">shield_person</span>
                        <h2 class="text-lg font-medium text-slate-800">Security & Threat Monitor</h2>
                    </div>
                    <a href="#" class="text-sm text-indigo-600 font-medium hover:text-indigo-700">View Full Log &rarr;</a>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-center items-center text-center">
                    <!-- Static Placeholder for now -->
                    <div
                        class="w-16 h-16 rounded-full bg-emerald-50 flex items-center justify-center mb-3 border border-emerald-100">
                        <span class="material-symbols-outlined text-emerald-500 text-3xl">verified_user</span>
                    </div>
                    <h3 class="text-slate-800 font-medium mb-1">No Active Threats Detected</h3>
                    <p class="text-slate-500 text-sm font-light">System is currently operating normally. Rate limits and
                        firewall are active.</p>
                </div>
            </div>

            <!-- Recent Admin Activity -->
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-medium text-slate-800">Recent Core Activity</h2>
                </div>
                <div class="p-6">
                    <ul
                        class="space-y-6 relative before:absolute before:inset-0 before:ml-8 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-200 before:to-transparent">

                        <li class="relative flex items-center justify-between gap-2">
                            <div class="flex items-center gap-3 w-full">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-50 border border-blue-100 text-blue-500 flex items-center justify-center shadow-sm z-10 shrink-0">
                                    <span class="material-symbols-outlined text-[16px]">person_add</span>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-700 font-medium">New User Registered</p>
                                    <p class="text-xs text-slate-400">alex@company.com joined</p>
                                </div>
                                <span class="text-xs text-slate-400 ml-auto shrink-0">2m ago</span>
                            </div>
                        </li>

                        <li class="relative flex items-center justify-between gap-2">
                            <div class="flex items-center gap-3 w-full">
                                <div
                                    class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-500 flex items-center justify-center shadow-sm z-10 shrink-0">
                                    <span class="material-symbols-outlined text-[16px]">add_business</span>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-700 font-medium">Workspace Created</p>
                                    <p class="text-xs text-slate-400">"Alpha Team" by Alex</p>
                                </div>
                                <span class="text-xs text-slate-400 ml-auto shrink-0">5m ago</span>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection