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
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6 md:mb-10">
            <div>
                <div
                    class="flex items-center gap-2 text-brand-slate/60 dark:text-slate-300 text-[11px] font-semibold uppercase tracking-widest mb-2 md:mb-3">
                    <span>Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                    <span class="text-brand-orange font-bold">All Projects</span>
                </div>
                <h2 class="font-outfit text-2xl sm:text-3xl font-medium text-brand-dark dark:text-white leading-tight tracking-tight">
                    Kanban <span class="text-brand-orange">Board.</span>
                </h2>
            </div>
            <a href="{{ route('member.tasks.create') }}"
                class="px-4 py-2 sm:px-5 sm:py-2.5 bg-brand-orange text-white text-xs sm:text-sm font-medium rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-2 w-fit">
                <span class="material-symbols-outlined text-[18px]">add</span>
                New Task
            </a>
        </div>

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
