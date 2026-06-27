@extends('layouts.member')

@section('title', 'Dashboard')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4">
        <!-- Header Besar ala SaaS -->
        <header class="max-w-6xl mb-8">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Workspace</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span>Dashboard</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Overview</span>
            </div>
            <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-brand-dark leading-tight tracking-tight max-w-3xl">
                Elevating the vision of your <br />
                <span class="text-brand-orange">curated projects.</span>
            </h2>
        </header>

        <div class="grid grid-cols-12 gap-8 max-w-7xl mt-10">
            <!-- Summary Stats Cards (Kiri, 8 Kolom) -->
            <div class="col-span-12 lg:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Todo Card -->
                <div
                    class="bg-white p-6 rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] relative overflow-hidden group hover:border-brand-teal/30 transition-all">
                    <div class="absolute top-0 right-0 p-5">
                        <span
                            class="material-symbols-outlined text-brand-slate/10 text-6xl group-hover:scale-110 transition-transform origin-top-right">pending</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[11px] font-semibold text-brand-slate uppercase tracking-widest mb-2">To Do</p>
                        <h3 class="text-5xl font-outfit font-medium text-brand-dark mb-3">
                            {{ str_pad($todoCount, 2, '0', STR_PAD_LEFT) }}</h3>
                        <div
                            class="flex items-center gap-1.5 text-[11px] font-medium text-brand-teal bg-brand-teal/5 w-fit px-2.5 py-1 rounded-md">
                            <span class="material-symbols-outlined text-[14px]">trending_up</span>
                            <span>+{{ $todoToday }} today</span>
                        </div>
                    </div>
                </div>
                <!-- In Progress Card -->
                <div
                    class="bg-white p-6 rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] relative overflow-hidden group hover:border-brand-teal/30 transition-all">
                    <div class="absolute top-0 right-0 p-5">
                        <span
                            class="material-symbols-outlined text-brand-orange/10 text-6xl group-hover:scale-110 transition-transform origin-top-right">bolt</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[11px] font-semibold text-brand-slate uppercase tracking-widest mb-2">In Progress</p>
                        <h3 class="text-5xl font-outfit font-medium text-brand-dark mb-4">
                            {{ str_pad($inProgressCount, 2, '0', STR_PAD_LEFT) }}</h3>
                        <div class="w-full bg-brand-surface h-1.5 rounded-full overflow-hidden">
                            <div class="bg-brand-orange h-full rounded-full shadow-[0_0_10px_rgba(229,117,0,0.5)]"
                                style="width: {{ $inProgressPercentage }}%"></div>
                        </div>
                    </div>
                </div>
                <!-- Done Card -->
                <div
                    class="bg-brand-dark p-6 rounded-[24px] shadow-[0_10px_30px_-15px_rgba(40,43,42,0.5)] relative overflow-hidden group">
                    <div
                        class="absolute -top-10 -right-10 w-40 h-40 bg-brand-teal/20 blur-[40px] rounded-full group-hover:bg-brand-teal/30 transition-colors">
                    </div>
                    <div class="absolute top-0 right-0 p-5">
                        <span
                            class="material-symbols-outlined text-white/5 text-6xl group-hover:scale-110 transition-transform origin-top-right">check_circle</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-[11px] font-semibold text-white/50 uppercase tracking-widest mb-2">Done</p>
                        <h3 class="text-5xl font-outfit font-medium text-white mb-3">
                            {{ str_pad($doneCount, 2, '0', STR_PAD_LEFT) }}</h3>
                        <div class="flex items-center gap-1.5 text-[11px] font-light text-white/80">
                            <span>Project Completion: <b
                                    class="font-medium text-white">{{ $completionPercentage }}%</b></span>
                        </div>
                    </div>
                </div>

                <!-- Tasks in Progress (Detailed List) -->
                <div
                    class="col-span-1 md:col-span-3 bg-white p-8 rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] mt-2">
                    <div class="flex items-center justify-between mb-8">
                        <h4 class="font-outfit text-xl font-medium text-brand-dark">Active Tasks</h4>
                        <a href="{{ route('member.tasks') }}"
                            class="text-brand-orange text-xs font-semibold uppercase tracking-widest hover:text-[#CC6800] transition-colors">View
                            All</a>
                    </div>
                    <div class="space-y-3">
                        <div class="space-y-3">
                            @forelse($activeTasks as $task)
                                <div
                                    class="group flex items-center justify-between p-4 rounded-2xl hover:bg-brand-surface border border-transparent hover:border-brand-teal/10 transition-all">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-white border border-brand-teal/10 flex items-center justify-center shadow-sm">
                                            <span class="material-symbols-outlined text-brand-orange"
                                                data-icon="architecture">architecture</span>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-medium text-brand-dark mb-0.5">{{ $task->title }}</h5>
                                            <p class="text-[11px] text-brand-slate font-light">
                                                {{ $task->project->name ?? 'No Project' }} •
                                                {{ $task->due_date ? 'Due ' . \Carbon\Carbon::parse($task->due_date)->diffForHumans() : 'No Due Date' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span
                                            class="px-3 py-1 rounded-full bg-brand-surface border border-brand-teal/20 text-brand-slate text-[10px] font-semibold uppercase tracking-widest">
                                            {{ str_replace('_', ' ', $task->status) }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-brand-slate text-sm font-light">
                                    Wah! Semua task sudah selesai.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan (4 Kolom): Activity Timeline & CTA -->
            <div class="col-span-12 lg:col-span-4 space-y-6 mt-2 lg:mt-0">
                <!-- Activity Feed Timeline -->
                <div
                    class="bg-white p-8 rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)]">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-8 h-8 rounded-full bg-brand-surface flex items-center justify-center">
                            <span class="material-symbols-outlined text-brand-dark text-[16px]"
                                data-icon="history">history</span>
                        </div>
                        <h4 class="font-outfit text-lg font-medium text-brand-dark">Team Activity</h4>
                    </div>

                    <!-- Timeline Wrapper -->
                    <div
                        class="space-y-8 relative before:absolute before:left-[15px] before:top-2 before:bottom-0 before:w-[1.5px] before:bg-brand-teal/10">

                        @forelse($recentActivities as $activity)
                            <div class="relative pl-10">
                                @php
                                    $icon = 'history';
                                    $bgClass = 'bg-brand-surface border-brand-teal/20';
                                    $iconColor = 'text-brand-dark';
                                    if (str_contains($activity->target_type, 'Task')) {
                                        $icon = 'check';
                                        $bgClass = 'bg-brand-orange/10 border-brand-orange/20';
                                        $iconColor = 'text-brand-orange';
                                    } elseif (str_contains($activity->target_type, 'Note')) {
                                        $icon = 'chat_bubble';
                                        $bgClass = 'bg-brand-teal/10 border-brand-teal/20';
                                        $iconColor = 'text-brand-teal';
                                    }
                                @endphp

                                <div
                                    class="absolute left-0 top-0.5 w-8 h-8 rounded-full {{ $bgClass }} ring-4 ring-white flex items-center justify-center border">
                                    <span
                                        class="material-symbols-outlined {{ $iconColor }} text-[14px]">{{ $icon }}</span>
                                </div>
                                <p class="text-[13px] text-brand-slate leading-relaxed">
                                    <span
                                        class="font-semibold text-brand-dark">{{ $activity->user->name ?? 'System' }}</span>
                                    {{ $activity->action }}
                                    <span
                                        class="text-brand-dark font-medium">{{ $activity->metadata['title'] ?? 'an item' }}</span>.
                                </p>
                                <span
                                    class="text-[10px] text-brand-slate/60 font-light block mt-1">{{ $activity->created_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <p class="text-xs text-brand-slate italic pl-10">Belum ada aktivitas dalam 7 hari terakhir.</p>
                        @endforelse

                    </div>
                </div>

                <!-- Premium CTA Card (AI Assistant) -->
                <div
                    class="bg-gradient-to-br from-[#1E2120] to-[#282B2A] p-8 rounded-[24px] text-white relative overflow-hidden shadow-xl border border-white/10 group cursor-pointer">
                    <!-- Orbs effect -->
                    <div
                        class="absolute -top-10 -right-10 w-40 h-40 bg-brand-orange/20 blur-[40px] rounded-full group-hover:bg-brand-orange/30 transition-colors">
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-brand-teal/20 blur-[40px] rounded-full"></div>

                    <div class="relative z-10">
                        <div
                            class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center mb-5 border border-white/10">
                            <span class="material-symbols-outlined text-brand-orange text-[20px]">auto_awesome</span>
                        </div>
                        <h5 class="font-outfit text-xl font-medium mb-2">Need a curator?</h5>
                        <p class="text-sm font-light text-white/70 mb-6 leading-relaxed">
                            Our AI assistant can help you organize and prioritize your tasks instantly.
                        </p>
                        <a href="{{ route('member.ai') }}"
                            class="block w-full py-3 bg-white text-brand-dark rounded-xl font-medium text-[13px] text-center shadow-lg group-hover:bg-brand-orange group-hover:text-white transition-all">
                            Launch Assistant
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
