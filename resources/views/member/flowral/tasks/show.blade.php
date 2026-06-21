@extends('layouts.member')

@section('title', 'Task Details')

@section('content')
    <div class="px-10 pb-12">
        <header class="max-w-6xl mb-8">
            <a href="{{ route('member.tasks') }}"
                class="text-sm font-bold text-secondary hover:underline mb-4 flex items-center gap-1 w-fit">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span> Back to Kanban
            </a>
            <div class="flex items-center gap-4 mt-2">
                <h2 class="font-headline text-display-md text-3xl font-extrabold text-on-surface leading-tight">
                    {{ $task->title }}
                </h2>
                <span
                    class="px-3 py-1 text-xs font-bold uppercase rounded-full 
                {{ $task->status === 'done' ? 'bg-teal-100 text-teal-700' : ($task->status === 'in_progress' ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-700') }}">
                    {{ str_replace('_', ' ', $task->status) }}
                </span>
            </div>
            <div class="text-sm text-on-surface-variant mt-4 flex flex-wrap gap-4">
                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">folder</span>
                    {{ $task->project->name }}</span>
                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">person</span>
                    {{ $task->assignee->name ?? 'Unassigned' }}</span>
            </div>
        </header>

        <div class="max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
            <!-- Task Info -->
            <div class="lg:col-span-2">
                <div
                    class="bg-surface-container-lowest p-8 rounded-2xl border border-outline-variant mb-8 editorial-shadow">
                    <h3
                        class="text-lg font-bold text-on-surface mb-4 border-b border-outline-variant pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">description</span> Description
                    </h3>
                    <div class="text-on-surface-variant text-sm leading-relaxed">
                        {!! nl2br(e($task->description ?: 'Tidak ada deskripsi untuk task ini.')) !!}
                    </div>
                </div>
            </div>

            <!-- Comments -->
            <div class="lg:col-span-1">
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant flex flex-col h-[550px] editorial-shadow">
                    <h3
                        class="text-lg font-bold text-on-surface mb-4 border-b border-outline-variant pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">forum</span> Discussion
                    </h3>

                    <!-- Comments List -->
                    <div class="flex-1 overflow-y-auto space-y-4 pr-2 mb-4 scrollbar-thin">
                        @forelse($task->comments as $comment)
                            <div class="bg-surface-container-low p-4 rounded-xl border border-outline-variant">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold text-on-surface flex items-center gap-1">
                                        {{ $comment->user->name }}
                                        @if ($comment->user_id === auth()->id())
                                            <span class="text-[10px] text-primary">(You)</span>
                                        @endif
                                    </span>
                                    <span
                                        class="text-[10px] text-on-surface-variant font-medium">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-on-surface-variant">{{ $comment->content }}</p>

                                @if ($comment->user_id === auth()->id())
                                    <form action="{{ route('member.tasks.comments.destroy', $comment) }}" method="POST"
                                        class="mt-3 text-right" onsubmit="return confirm('Hapus komentar?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-[11px] font-bold text-error hover:underline">Delete</button>
                                    </form>
                                @endif
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center h-full opacity-50">
                                <span class="material-symbols-outlined text-4xl mb-2">speaker_notes_off</span>
                                <p class="text-sm text-center">Belum ada komentar.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Add Comment Form -->
                    <form action="{{ route('member.tasks.comments.store', $task) }}" method="POST"
                        class="mt-auto pt-4 border-t border-outline-variant">
                        @csrf
                        <textarea name="content" rows="2" required placeholder="Tulis komentar..."
                            class="w-full text-sm rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary px-4 py-3 mb-3 resize-none"></textarea>
                        <button type="submit"
                            class="w-full py-2.5 bg-primary text-on-primary font-bold text-sm rounded-xl hover:opacity-90 transition shadow-sm">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
