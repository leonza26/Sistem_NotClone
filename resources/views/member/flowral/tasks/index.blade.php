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

    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-[1600px]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <div
                    class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                    <span>Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                    <span class="text-brand-orange font-bold">All Projects</span>
                </div>
                <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                    Kanban <span class="text-brand-orange">Board.</span>
                </h2>
            </div>
            <a href="{{ route('member.tasks.create') }}"
                class="px-5 py-2.5 bg-brand-orange text-white text-sm font-medium rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-2 w-fit">
                <span class="material-symbols-outlined text-[18px]">add</span>
                New Task
            </a>
        </div>


        <!-- Kanban Board Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">

            <!-- COLUMN 1: TODO -->
            <div class="flex flex-col bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-slate/30"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark">To Do</h3>
                        <span
                            class="bg-white border border-brand-teal/10 text-brand-slate px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm">{{ $todoTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface rounded-[24px] p-3 min-h-[600px] border border-dashed border-brand-teal/20 transition-all kanban-column flex flex-col"
                    data-status="todo">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
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
            <div class="flex flex-col bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(229,117,0,0.5)]"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark">In Progress</h3>
                        <span
                            class="bg-white border border-brand-teal/10 text-brand-slate px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm">{{ $inProgressTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface rounded-[24px] p-3 min-h-[600px] border border-dashed border-brand-teal/20 transition-all kanban-column flex flex-col"
                    data-status="in_progress">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
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
            <div class="flex flex-col bg-brand-surface/50 rounded-[32px] p-2 border border-brand-teal/5">
                <div class="flex items-center justify-between px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-brand-teal shadow-[0_0_10px_rgba(129,180,197,0.5)]"></span>
                        <h3 class="font-outfit text-lg font-medium text-brand-dark">Done</h3>
                        <span
                            class="bg-white border border-brand-teal/10 text-brand-slate px-2 py-0.5 rounded-md text-[11px] font-bold shadow-sm">{{ $doneTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-brand-surface rounded-[24px] p-3 min-h-[600px] border border-dashed border-brand-teal/20 transition-all kanban-column flex flex-col"
                    data-status="done">
                    <div class="space-y-3 kanban-list flex-1 flex flex-col">
                        <div
                            class="flex-1 flex-col items-center justify-center text-center py-12 text-brand-slate/40 border-2 border-dashed border-transparent rounded-[20px] empty-placeholder">
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
