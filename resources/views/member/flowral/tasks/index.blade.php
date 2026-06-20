@extends('layouts.member')

@section('title', 'Tasks Kanban')

@section('content')
    <style>
        /* Sembunyikan placeholder secara default */
        .kanban-list .empty-placeholder {
            display: none;
        }

        /* Munculkan HANYA JIKA dia adalah satu-satunya elemen di dalam kolom */
        .kanban-list .empty-placeholder:only-child {
            display: block;
        }
    </style>
    <!-- Canvas -->
    <div class="px-10 pb-12 max-w-[1600px] mx-auto">
        <!-- Editorial Header -->
        <div class="flex justify-between items-end mb-12">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-on-surface-variant font-label text-xs uppercase tracking-widest">Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                    <span class="text-on-surface-variant font-label text-xs uppercase tracking-widest">All Projects</span>
                </div>
                <h2 class="font-headline text-5xl font-extrabold tracking-tight text-on-surface">
                    Tasks
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('member.tasks.create') }}"
                    class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-br from-primary to-primary-container text-white rounded-lg font-bold text-sm editorial-shadow hover:scale-[1.02] active:scale-[0.98] transition-all">
                    <span class="material-symbols-outlined text-lg" data-icon="add">add</span>
                    New Task
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-8 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Kanban Board -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- COLUMN 1: TODO -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                        <h3 class="font-headline text-lg font-bold text-on-surface">Todo</h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">{{ $todoTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all kanban-column"
                    data-status="todo">
                    <div class="space-y-4 kanban-list min-h-full">
                        <!-- Placeholder Selalu Ditaruh Di Atas -->
                        <div
                            class="text-center py-10 text-slate-400 text-sm border-2 border-dashed border-slate-200 rounded-xl empty-placeholder">
                            Belum ada Task Todo
                        </div>

                        <!-- Lakukan Foreach biasa -->
                        @foreach ($todoTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-slate-100 text-slate-600',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- COLUMN 2: IN PROGRESS -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                        <h3 class="font-headline text-lg font-bold text-on-surface">In Progress</h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">{{ $inProgressTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all kanban-column"
                    data-status="in_progress">
                    <div class="space-y-4 kanban-list min-h-full">
                        <div
                            class="text-center py-10 text-slate-400 text-sm border-2 border-dashed border-slate-200 rounded-xl empty-placeholder">
                            Belum ada Task In Progress
                        </div>

                        @foreach ($inProgressTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-blue-100 text-blue-700',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- COLUMN 3: DONE -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        <h3 class="font-headline text-lg font-bold text-on-surface">Done</h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">{{ $doneTasks->count() }}</span>
                    </div>
                </div>
                <div class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all kanban-column"
                    data-status="done">
                    <div class="space-y-4 kanban-list min-h-full">
                        <div
                            class="text-center py-10 text-slate-400 text-sm border-2 border-dashed border-slate-200 rounded-xl empty-placeholder">
                            Belum ada Task Done
                        </div>

                        @foreach ($doneTasks as $task)
                            @include('member.flowral.tasks.partials.task-card', [
                                'task' => $task,
                                'color' => 'bg-teal-100 text-teal-700',
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            // Pilih semua area yang bisa didrop (kanban-list)
            const columns = document.querySelectorAll('.kanban-list');

            columns.forEach(column => {
                new Sortable(column, {
                    group: 'kanban',
                    animation: 150,
                    ghostClass: 'opacity-40',
                    dragClass: 'scale-105',
                    draggable: '.group', // HANYA drag elemen yang punya class group (kartu asli)

                    onEnd: function(evt) {
                        const itemEl = evt.item;
                        const toList = evt.to;

                        const taskId = itemEl.getAttribute('data-id');

                        // Jika entah bagaimana yang ditarik tidak punya ID, batalkan proses (jangan tembak ke backend)
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
                                }
                            })
                            .catch(error => {
                                console.error('Terdapat Kesalahan Teknis:', error);
                                alert(
                                    'Gagal memindahkan! Silakan tekan F12 dan cek Console (Inspect Element) untuk melihat penyebab pastinya.'
                                );
                                window.location.reload();
                            });
                    },
                });
            });
        });
    </script>
@endsection
