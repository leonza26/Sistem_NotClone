@extends('layouts.member')

@section('title', 'Activity Timeline')

@section('content')
    <div class="max-w-[1600px] px-8 lg:px-10 pb-12 pt-4">
        <!-- Header -->
        <div class="mb-10">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Workspace</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Activity Stream</span>
            </div>
            <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                Activity <span class="text-brand-orange">Timeline.</span>
            </h2>
            <p class="text-brand-slate font-light mt-2 text-sm max-w-2xl">
                A curated flow of updates and milestones across your production environment.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Timeline Canvas -->
            <div
                class="lg:col-span-2 bg-white rounded-[32px] p-8 lg:p-12 border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] relative overflow-hidden">
                <!-- Vertical Line -->
                <div class="absolute left-16 top-0 bottom-0 w-[1px] bg-brand-teal/10"></div>

                <div class="space-y-12 relative z-10">

                    @forelse($activities as $dateGroup => $dailyActivities)
                        <div class="{{ $loop->first ? '' : 'pt-8' }}">
                            <!-- Label Waktu (Today / Yesterday / Tanggal) -->
                            <h3
                                class="ml-20 text-[10px] font-bold tracking-widest uppercase mb-8 w-fit px-3 py-1 rounded-full {{ $dateGroup === 'Today' ? 'text-brand-orange bg-brand-orange/10' : 'text-brand-slate bg-brand-surface border border-brand-teal/10' }}">
                                {{ $dateGroup }}
                            </h3>

                            @foreach ($dailyActivities as $activity)
                                @php
                                    // Logika menentukan Icon dan Warna berdasarkan jenis data yang dirubah
                                    $icon = 'history'; // icon default
                                    $colorClass = 'bg-brand-surface text-brand-dark border-brand-teal/10';

                                    if (str_contains($activity->target_type, 'Task')) {
                                        $icon = $activity->action == 'created' ? 'add_task' : 'task_alt';
                                        $colorClass = 'bg-brand-surface text-brand-dark border-brand-teal/10';
                                    } elseif (str_contains($activity->target_type, 'Note')) {
                                        $icon = 'edit_note';
                                        $colorClass = 'bg-brand-surface text-brand-teal border-brand-teal/10';
                                    } elseif (str_contains($activity->target_type, 'Project')) {
                                        $icon = 'folder_open';
                                        $colorClass = 'bg-brand-orange/10 text-brand-orange border-brand-orange/20';
                                    }
                                @endphp

                                <!-- Activity Item -->
                                <div class="relative flex gap-6 items-start {{ $loop->first ? '' : 'mt-10' }} group">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 rounded-full border shadow-sm z-10 {{ $colorClass }}">
                                        <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
                                    </div>
                                    <div class="flex-1 pt-1.5">
                                        <div class="flex justify-between items-start mb-2">
                                            <p class="text-[14px] text-brand-dark font-light">
                                                <span
                                                    class="font-medium hover:text-brand-orange cursor-pointer transition-colors">
                                                    {{ $activity->user->name ?? 'System/AI Assistant' }}
                                                </span>
                                                {{ $activity->action }}
                                                <span
                                                    class="font-medium">{{ $activity->metadata['title'] ?? 'an item' }}</span>
                                            </p>
                                            <span
                                                class="text-[10px] font-semibold text-brand-slate uppercase tracking-wider bg-brand-surface px-2 py-1 rounded-md">
                                                {{ $activity->created_at->format('h:i A') }}
                                            </span>
                                        </div>

                                        <!-- Detail metadata jika itu Update -->
                                        @if ($activity->action === 'updated' && !empty($activity->metadata['changed_fields']))
                                            <div class="p-3 border-l-[3px] border-brand-teal/30 ml-2">
                                                <p class="text-[13px] italic text-brand-slate font-light">
                                                    Berhasil mengupdate kolom: <span
                                                        class="font-medium">{{ implode(', ', $activity->metadata['changed_fields']) }}</span>
                                                </p>
                                            </div>
                                        @elseif($activity->action === 'created')
                                            <!-- Detail info jika itu Create -->
                                            <div
                                                class="bg-brand-surface/50 rounded-[20px] p-4 border border-brand-teal/5 transition-all group-hover:bg-brand-surface">
                                                <p class="text-[13px] text-brand-slate font-light leading-relaxed">
                                                    Sebuah {{ class_basename($activity->target_type) }} baru telah
                                                    ditambahkan ke dalam Workspace.
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="text-center py-20 mt-10">
                            <div
                                class="w-20 h-20 bg-brand-surface rounded-full flex items-center justify-center mx-auto mb-4 border border-brand-teal/10">
                                <span
                                    class="material-symbols-outlined text-[32px] text-brand-slate">history_toggle_off</span>
                            </div>
                            <h3 class="text-brand-dark font-medium text-lg">Belum ada aktivitas</h3>
                            <p class="text-brand-slate font-light text-sm mt-1">Lakukan sesuatu di Workspace ini agar log
                                tercatat.</p>
                        </div>
                    @endforelse

                    <!-- Custom Pagination UI -->
                    @if ($paginatedActivities->hasPages())
                        <div class="mt-12 pt-8 border-t border-brand-teal/10 flex justify-between items-center">

                            <!-- Tombol Previous -->
                            @if ($paginatedActivities->onFirstPage())
                                <span
                                    class="px-4 py-2 bg-brand-surface text-brand-slate/50 rounded-xl text-xs font-medium cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $paginatedActivities->previousPageUrl() }}"
                                    class="px-4 py-2 bg-white border border-brand-teal/20 text-brand-dark hover:text-brand-orange hover:border-brand-orange/30 rounded-xl text-xs font-medium transition-colors shadow-sm">Previous</a>
                            @endif

                            <!-- Indikator Halaman -->
                            <div class="text-xs font-light text-brand-slate">
                                Page <span
                                    class="font-medium text-brand-dark">{{ $paginatedActivities->currentPage() }}</span> of
                                <span class="font-medium text-brand-dark">{{ $paginatedActivities->lastPage() }}</span>
                            </div>

                            <!-- Tombol Next -->
                            @if ($paginatedActivities->hasMorePages())
                                <a href="{{ $paginatedActivities->nextPageUrl() }}"
                                    class="px-4 py-2 bg-white border border-brand-teal/20 text-brand-dark hover:text-brand-orange hover:border-brand-orange/30 rounded-xl text-xs font-medium transition-colors shadow-sm">Next</a>
                            @else
                                <span
                                    class="px-4 py-2 bg-brand-surface text-brand-slate/50 rounded-xl text-xs font-medium cursor-not-allowed">Next</span>
                            @endif

                        </div>
                    @endif

                </div>
            </div>

            <!-- Sidebar / Stats -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Insights Card -->
                <div
                    class="bg-brand-dark rounded-[32px] p-8 text-white shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-brand-orange/20 blur-2xl rounded-full"></div>
                    <h4 class="text-[10px] font-bold uppercase tracking-widest text-brand-surface/60 mb-8">
                        Weekly Pulse
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <p class="font-outfit text-5xl font-medium">{{ $stats['total'] }}</p>
                            <p class="text-[11px] font-medium text-brand-surface/60 mt-1 tracking-wide">
                                Total Activities
                            </p>
                        </div>
                        <div class="h-[1px] bg-brand-surface/10 w-full"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-outfit text-2xl font-medium">{{ $stats['tasks'] }}</p>
                                <p class="text-[9px] text-brand-surface/60 uppercase tracking-widest mt-1">Tasks</p>
                            </div>
                            <div>
                                <p class="font-outfit text-2xl font-medium">{{ $stats['notes'] }}</p>
                                <p class="text-[9px] text-brand-surface/60 uppercase tracking-widest mt-1">Notes</p>
                            </div>
                            <div>
                                <p class="font-outfit text-2xl font-medium text-brand-orange">{{ $stats['projects'] }}</p>
                                <p class="text-[9px] text-brand-orange uppercase tracking-widest mt-1">Projects</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <div class="bg-white rounded-[32px] p-6 shadow-sm border border-brand-teal/10">
                    <h4 class="text-[10px] font-bold text-brand-slate uppercase tracking-widest mb-4 px-2">Filters</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ url()->current() }}"
                            class="px-4 py-2 rounded-full text-[11px] font-semibold transition-colors {{ !$filter ? 'bg-brand-dark text-white shadow-md' : 'bg-brand-surface border border-brand-teal/10 text-brand-slate hover:bg-white' }}">
                            Everything
                        </a>
                        <a href="{{ url()->current() }}?filter=tasks"
                            class="px-4 py-2 rounded-full text-[11px] font-medium transition-colors {{ $filter === 'tasks' ? 'bg-brand-dark text-white shadow-md' : 'bg-brand-surface border border-brand-teal/10 text-brand-slate hover:bg-white' }}">
                            Tasks
                        </a>
                        <a href="{{ url()->current() }}?filter=notes"
                            class="px-4 py-2 rounded-full text-[11px] font-medium transition-colors {{ $filter === 'notes' ? 'bg-brand-dark text-white shadow-md' : 'bg-brand-surface border border-brand-teal/10 text-brand-slate hover:bg-white' }}">
                            Notes
                        </a>
                        <a href="{{ url()->current() }}?filter=projects"
                            class="px-4 py-2 rounded-full text-[11px] font-medium transition-colors {{ $filter === 'projects' ? 'bg-brand-dark text-white shadow-md' : 'bg-brand-surface border border-brand-teal/10 text-brand-slate hover:bg-white' }}">
                            Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
