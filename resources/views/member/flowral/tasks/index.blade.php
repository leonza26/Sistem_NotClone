@extends('layouts.member')

@section('title', 'Tasks Kanban')

@section('content')
    <style>
        .kanban-list .empty-placeholder {
            display: none;
        }

        .kanban-list .empty-placeholder:only-child {
            display: flex;
        }

        /* Menghaluskan drag animation */
        .sortable-ghost {
            opacity: 0.4;
        }

        .sortable-drag {
            cursor: grabbing !important;
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <div class="px-4 sm:px-6 lg:px-10 pb-12 pt-4 max-w-[1600px]" x-data="{ activeTab: 'todo' }">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6 md:mb-8">
            <div>
                <!-- Dynamic Breadcrumb -->
                <div
                    class="flex items-center gap-2 text-brand-slate/60 dark:text-slate-300 text-[11px] font-semibold uppercase tracking-widest mb-2 md:mb-3">
                    <span>Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                    <span class="text-brand-orange font-bold truncate max-w-[200px]">{{ $currentProject ? $currentProject->name : 'All Projects' }}</span>
                    @if($filterAssignedMe)
                        <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                        <span class="text-brand-orange font-bold">Assigned to Me</span>
                    @endif
                </div>

                <!-- Title & Project Selector Dropdown -->
                <div class="flex items-center gap-3 sm:gap-4 flex-wrap">
                    <h2 class="font-outfit text-2xl sm:text-3xl font-medium text-brand-dark dark:text-white leading-tight tracking-tight">
                        Kanban <span class="text-brand-orange">Board.</span>
                    </h2>

                    <!-- Project Filter Dropdown (Alpine.js) -->
                    <div x-data="{ openProjectMenu: false, searchProject: '' }" class="relative z-30">
                        <button @click="openProjectMenu = !openProjectMenu" @click.away="openProjectMenu = false" type="button"
                            class="px-3.5 py-1.5 sm:py-2 bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-slate-700 hover:border-brand-orange/50 dark:hover:border-brand-orange/50 rounded-xl flex items-center gap-2 text-xs sm:text-sm font-medium text-brand-dark dark:text-white shadow-sm transition-all focus:outline-none">
                            <span class="material-symbols-outlined text-[18px] text-brand-orange">folder_open</span>
                            <span class="max-w-[130px] sm:max-w-[200px] truncate">{{ $currentProject ? $currentProject->name : 'All Projects' }}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-brand-orange/10 text-brand-orange border border-brand-orange/20">
                                {{ $currentProject ? $currentProject->tasks_count : $totalTasksCount }}
                            </span>
                            <span class="material-symbols-outlined text-[16px] text-brand-slate/60 dark:text-slate-400 transition-transform duration-200"
                                :class="openProjectMenu ? 'rotate-180' : ''">expand_more</span>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="openProjectMenu" x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute left-0 mt-2 w-72 sm:w-80 bg-white dark:bg-slate-800 rounded-2xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] border border-brand-teal/15 dark:border-slate-700 p-2 z-40">
                            
                            <!-- Search Input (jika project > 3) -->
                            @if($projects->count() > 3)
                                <div class="relative mb-2 px-1">
                                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-[16px] text-brand-slate/50 dark:text-slate-400">search</span>
                                    <input type="text" x-model="searchProject" placeholder="Cari project..."
                                        class="w-full pl-8 pr-3 py-1.5 text-xs bg-brand-surface dark:bg-slate-900 border border-brand-teal/10 dark:border-slate-700 rounded-lg text-brand-dark dark:text-white placeholder-brand-slate/40 focus:outline-none focus:border-brand-orange">
                                </div>
                            @endif

                            <!-- List Options -->
                            <div class="max-h-64 overflow-y-auto custom-scrollbar space-y-1">
                                <!-- Option: All Projects -->
                                <a href="{{ route('member.tasks', array_merge(request()->except('project_id'), ['project_id' => 'all'])) }}"
                                    class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-all {{ $selectedProjectId === 'all' ? 'bg-brand-orange/10 text-brand-orange font-bold' : 'text-brand-dark dark:text-slate-200 hover:bg-brand-surface dark:hover:bg-slate-700' }}">
                                    <div class="flex items-center gap-2 min-w-0">
                                        <span class="material-symbols-outlined text-[16px] {{ $selectedProjectId === 'all' ? 'text-brand-orange' : 'text-brand-slate/50 dark:text-slate-400' }}">grid_view</span>
                                        <span class="truncate">All Projects</span>
                                    </div>
                                    <div class="flex items-center gap-2 flex-shrink-0">
                                        <span class="px-2 py-0.5 rounded-md text-[10px] {{ $selectedProjectId === 'all' ? 'bg-brand-orange text-white' : 'bg-brand-surface dark:bg-slate-900 text-brand-slate dark:text-slate-300' }}">
                                            {{ $totalTasksCount }}
                                        </span>
                                        @if($selectedProjectId === 'all')
                                            <span class="material-symbols-outlined text-[16px] text-brand-orange">check</span>
                                        @endif
                                    </div>
                                </a>

                                <div class="h-px bg-brand-teal/10 dark:bg-slate-700 my-1"></div>

                                <!-- Options: Individual Projects -->
                                @forelse($projects as $project)
                                    <a href="{{ route('member.tasks', array_merge(request()->except('project_id'), ['project_id' => $project->id])) }}"
                                        x-show="!searchProject || {{ json_encode(strtolower($project->name)) }}.includes(searchProject.toLowerCase())"
                                        class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-all {{ $selectedProjectId == $project->id ? 'bg-brand-orange/10 text-brand-orange font-bold' : 'text-brand-dark dark:text-slate-200 hover:bg-brand-surface dark:hover:bg-slate-700' }}">
                                        <div class="flex items-center gap-2 min-w-0">
                                            <span class="w-2 h-2 rounded-full flex-shrink-0 {{ $selectedProjectId == $project->id ? 'bg-brand-orange' : 'bg-brand-slate/40 dark:bg-slate-500' }}"></span>
                                            <span class="truncate">{{ $project->name }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 flex-shrink-0">
                                            <span class="px-2 py-0.5 rounded-md text-[10px] {{ $selectedProjectId == $project->id ? 'bg-brand-orange text-white' : 'bg-brand-surface dark:bg-slate-900 text-brand-slate dark:text-slate-300' }}">
                                                {{ $project->tasks_count }}
                                            </span>
                                            @if($selectedProjectId == $project->id)
                                                <span class="material-symbols-outlined text-[16px] text-brand-orange">check</span>
                                            @endif
                                        </div>
                                    </a>
                                @empty
                                    <div class="px-3 py-2 text-center text-xs text-brand-slate/50 dark:text-slate-400">
                                        Belum ada project
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons: My Tasks Filter & New Task -->
            <div class="flex items-center gap-2.5 sm:gap-3 flex-wrap">
                <!-- My Tasks Toggle Button -->
                <a href="{{ route('member.tasks', array_merge(request()->all(), ['assigned' => $filterAssignedMe ? null : 'me'])) }}"
                    class="px-3 py-2 sm:px-4 sm:py-2.5 text-xs sm:text-sm font-medium rounded-xl border transition-all flex items-center gap-1.5 {{ $filterAssignedMe ? 'bg-brand-orange text-white border-brand-orange shadow-[0_4px_14px_0_rgba(229,117,0,0.39)]' : 'bg-white dark:bg-slate-800 border-brand-teal/20 dark:border-slate-700 text-brand-slate dark:text-slate-300 hover:text-brand-dark dark:hover:text-white shadow-sm' }}"
                    title="{{ $filterAssignedMe ? 'Tampilkan semua task' : 'Hanya tampilkan task saya' }}">
                    <span class="material-symbols-outlined text-[16px]">person</span>
                    <span>My Tasks</span>
                    @if($filterAssignedMe)
                        <span class="w-1.5 h-1.5 rounded-full bg-white ml-0.5"></span>
                    @endif
                </a>

                <!-- New Task Button -->
                <a href="{{ route('member.tasks.create', $selectedProjectId !== 'all' ? ['project_id' => $selectedProjectId] : []) }}"
                    class="px-3.5 py-2 sm:px-5 sm:py-2.5 bg-brand-orange text-white text-xs sm:text-sm font-medium rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-1.5 sm:gap-2 w-fit">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    <span>New Task</span>
                </a>
            </div>
        </div>

        <!-- Filter Active Feedback Indicators -->
        @if($selectedProjectId !== 'all' || $filterAssignedMe)
            <div class="flex items-center gap-2 mb-6 text-xs text-brand-slate dark:text-slate-400 flex-wrap">
                <span class="font-medium">Filter Aktif:</span>
                @if($currentProject)
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white dark:bg-slate-800 border border-brand-teal/15 dark:border-slate-700 text-brand-dark dark:text-white font-medium shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span>
                        <span>Project: {{ $currentProject->name }}</span>
                        <a href="{{ route('member.tasks', array_merge(request()->except('project_id'), ['project_id' => 'all'])) }}"
                            class="hover:text-brand-orange ml-1 text-sm leading-none font-bold text-slate-400" title="Hapus filter project">&times;</a>
                    </span>
                @endif
                @if($filterAssignedMe)
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white dark:bg-slate-800 border border-brand-teal/15 dark:border-slate-700 text-brand-dark dark:text-white font-medium shadow-sm">
                        <span class="material-symbols-outlined text-[14px] text-brand-orange">person</span>
                        <span>Ditugaskan ke Saya</span>
                        <a href="{{ route('member.tasks', request()->except('assigned')) }}"
                            class="hover:text-brand-orange ml-1 text-sm leading-none font-bold text-slate-400" title="Hapus filter task saya">&times;</a>
                    </span>
                @endif
                <a href="{{ route('member.tasks') }}" class="text-brand-orange hover:underline ml-1 font-medium">Reset Semua Filter</a>
            </div>
        @endif

        <!-- Mobile Segmented Tabs (< lg) -->
        <div class="flex lg:hidden bg-brand-surface dark:bg-slate-900 p-1.5 rounded-2xl border border-brand-teal/20 dark:border-slate-800 mb-6 shadow-sm">
            <button @click="activeTab = 'todo'" type="button"
                :class="activeTab === 'todo' ? 'bg-white dark:bg-slate-800 text-brand-dark dark:text-white shadow-sm font-semibold' : 'text-slate-500 dark:text-slate-400 font-medium'"
                class="flex-1 py-2.5 rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all">
                <span class="w-2 h-2 rounded-full bg-brand-slate/40"></span>
                <span>To Do</span>
                <span class="px-1.5 py-0.5 rounded-md text-[10px] bg-slate-100 dark:bg-slate-700 font-bold">{{ $todoTasks->count() }}</span>
            </button>
            <button @click="activeTab = 'in_progress'" type="button"
                :class="activeTab === 'in_progress' ? 'bg-white dark:bg-slate-800 text-brand-orange shadow-sm font-semibold' : 'text-slate-500 dark:text-slate-400 font-medium'"
                class="flex-1 py-2.5 rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all">
                <span class="w-2 h-2 rounded-full bg-brand-orange"></span>
                <span>Progress</span>
                <span class="px-1.5 py-0.5 rounded-md text-[10px] bg-brand-orange/10 text-brand-orange font-bold">{{ $inProgressTasks->count() }}</span>
            </button>
            <button @click="activeTab = 'done'" type="button"
                :class="activeTab === 'done' ? 'bg-white dark:bg-slate-800 text-brand-teal shadow-sm font-semibold' : 'text-slate-500 dark:text-slate-400 font-medium'"
                class="flex-1 py-2.5 rounded-xl text-xs flex items-center justify-center gap-1.5 transition-all">
                <span class="w-2 h-2 rounded-full bg-brand-teal"></span>
                <span>Done</span>
                <span class="px-1.5 py-0.5 rounded-md text-[10px] bg-brand-teal/10 text-brand-teal font-bold">{{ $doneTasks->count() }}</span>
            </button>
        </div>

        <!-- Kanban Board Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">

            <!-- COLUMN 1: TODO -->
            <div :class="{ 'hidden': activeTab !== 'todo', 'flex': activeTab === 'todo' }"
                 class="flex-col lg:flex bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-slate/30"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark dark:text-white">To Do</h3>
                        <span
                            class="bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 text-brand-slate dark:text-slate-300 px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm dark:shadow-none">{{ $todoTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface dark:bg-slate-900 rounded-[24px] p-3 min-h-[500px] lg:min-h-[600px] border border-dashed border-brand-teal/20 dark:border-brand-teal/30 transition-all kanban-column flex flex-col"
                    data-status="todo">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 dark:text-slate-300 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
                            <span class="material-symbols-outlined text-4xl mb-2">inbox</span>
                            <span class="text-sm font-medium">No tasks yet</span>
                        </div>
                        @foreach ($todoTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-brand-surface text-brand-slate border-brand-teal/20',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- COLUMN 2: IN PROGRESS -->
            <div :class="{ 'hidden': activeTab !== 'in_progress', 'flex': activeTab === 'in_progress' }"
                 class="flex-col lg:flex bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(229,117,0,0.5)]"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark dark:text-white">In Progress</h3>
                        <span
                            class="bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 text-brand-slate dark:text-slate-300 px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm dark:shadow-none">{{ $inProgressTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface dark:bg-slate-900 rounded-[24px] p-3 min-h-[500px] lg:min-h-[600px] border border-dashed border-brand-teal/20 dark:border-brand-teal/30 transition-all kanban-column flex flex-col"
                    data-status="in_progress">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 dark:text-slate-300 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
                            <span class="material-symbols-outlined text-4xl mb-2">bolt</span>
                            <span class="text-sm font-medium">Clear board</span>
                        </div>
                        @foreach ($inProgressTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-brand-orange/10 text-brand-orange border-brand-orange/20',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- COLUMN 3: DONE -->
            <div :class="{ 'hidden': activeTab !== 'done', 'flex': activeTab === 'done' }"
                 class="flex-col lg:flex bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-teal shadow-[0_0_10px_rgba(129,180,197,0.5)]"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark dark:text-white">Done</h3>
                        <span
                            class="bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 text-brand-slate dark:text-slate-300 px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm dark:shadow-none">{{ $doneTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface dark:bg-slate-900 rounded-[24px] p-3 min-h-[500px] lg:min-h-[600px] border border-dashed border-brand-teal/20 dark:border-brand-teal/30 transition-all kanban-column flex flex-col"
                    data-status="done">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 dark:text-slate-300 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
                            <span class="material-symbols-outlined text-4xl mb-2">done_all</span>
                            <span class="text-sm font-medium">Awaiting completion</span>
                        </div>
                        @foreach ($doneTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-brand-teal/10 text-brand-teal border-brand-teal/20',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="module">
        window.moveTaskStatus = function(taskId, newStatus) {
            fetch(`/member/tasks/${taskId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(async response => {
                if (!response.ok) {
                    const errorText = await response.text();
                    throw new Error(`HTTP Error ${response.status}: ${errorText}`);
                }
                return response.json();
            })
            .then(data => {
                if (!data.success) {
                    alert('Gagal dari server: ' + (data.message || 'Unknown error'));
                }
                window.location.reload();
            })
            .catch(error => {
                console.error('Terdapat Kesalahan Teknis:', error);
                window.location.reload();
            });
        };

        document.addEventListener('DOMContentLoaded', function() {
            const columns = document.querySelectorAll('.kanban-list');

            columns.forEach(column => {
                new Sortable(column, {
                    group: 'kanban',
                    animation: 200,
                    easing: "cubic-bezier(1, 0, 0, 1)",
                    ghostClass: 'sortable-ghost',
                    dragClass: 'sortable-drag',
                    draggable: '.kanban-card',

                    onEnd: function(evt) {
                        const itemEl = evt.item;
                        const toList = evt.to;
                        const taskId = itemEl.getAttribute('data-id');
                        if (!taskId) return;

                        const newStatus = toList.closest('.kanban-column').getAttribute(
                            'data-status');

                        fetch(`/member/tasks/${taskId}/status`, {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    status: newStatus
                                })
                            })
                            .then(async response => {
                                if (!response.ok) {
                                    const errorText = await response.text();
                                    throw new Error(
                                        `HTTP Error ${response.status}: ${errorText}`
                                        );
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (!data.success) {
                                    alert('Gagal dari server: ' + (data.message ||
                                        'Unknown error'));
                                    window.location.reload();
                                } else {
                                    // Update color label class based on new column dynamically if needed
                                    // (Refresh is safer, but Alpine/JS can handle it too)
                                }
                            })
                            .catch(error => {
                                console.error('Terdapat Kesalahan Teknis:', error);
                                window.location.reload();
                            });
                    },
                });
            });
        });
    </script>
@endsection
