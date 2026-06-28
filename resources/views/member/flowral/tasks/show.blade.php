@extends('layouts.member')

@section('title', 'Task Details')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-7xl">
        <header class="mb-10">
            <a href="{{ route('member.tasks') }}"
                class="flex items-center gap-1 text-[13px] text-brand-slate hover:text-brand-orange transition-colors mb-6 font-medium w-fit">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span> Back to Kanban
            </a>
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                <h2 class="font-outfit text-3xl sm:text-4xl font-medium text-brand-dark leading-tight tracking-tight">
                    {{ $task->title }}
                </h2>
                <span
                    class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-widest rounded-md w-fit
                {{ $task->status === 'done' ? 'bg-brand-teal/10 text-brand-teal border border-brand-teal/20' : ($task->status === 'in_progress' ? 'bg-brand-orange/10 text-brand-orange border border-brand-orange/20' : 'bg-brand-surface text-brand-slate border border-brand-teal/20') }}">
                    {{ str_replace('_', ' ', $task->status) }}
                </span>
            </div>
            <div class="mt-5 flex flex-wrap gap-5">
                <div class="flex items-center gap-2 text-sm text-brand-slate">
                    <div
                        class="w-8 h-8 rounded-full bg-brand-surface flex items-center justify-center border border-brand-teal/10">
                        <span class="material-symbols-outlined text-[16px]">folder</span>
                    </div>
                    <span class="font-medium">{{ $task->project->name }}</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-brand-slate">
                    @if ($task->assignee)
                        <img alt="Assignee" class="w-8 h-8 rounded-full object-cover border border-brand-teal/10"
                            src="https://ui-avatars.com/api/?name={{ urlencode($task->assignee->name) }}&background=F5FAFB&color=282B2A&bold=true" />
                        <span class="font-medium">{{ $task->assignee->name }}</span>
                    @else
                        <div
                            class="w-8 h-8 rounded-full bg-brand-surface flex items-center justify-center border border-brand-teal/10">
                            <span class="material-symbols-outlined text-[16px]">person_off</span>
                        </div>
                        <span class="italic font-light">Unassigned</span>
                    @endif
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Task Info (Kiri) -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white p-8 sm:p-10 rounded-[32px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)]">
                    <h3 class="font-outfit text-xl font-medium text-brand-dark mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-orange">description</span>
                        Description
                    </h3>
                    <div class="text-brand-slate text-[14px] leading-relaxed font-light whitespace-pre-wrap">
                        {!! nl2br(e($task->description ?: 'Tidak ada deskripsi untuk task ini.')) !!}
                    </div>
                </div>
            </div>

            <!-- Comments / Discussion (Kanan) -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white p-6 sm:p-8 rounded-[32px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] flex flex-col h-[600px]">
                    <h3 class="font-outfit text-xl font-medium text-brand-dark mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-teal">forum</span>
                        Discussion
                    </h3>

                    <!-- Comments List -->
                    <div class="flex-1 overflow-y-auto space-y-5 pr-2 mb-6 custom-scrollbar">
                        @forelse($task->comments as $comment)
                            <div
                                class="flex flex-col {{ $comment->user_id === auth()->id() ? 'items-end' : 'items-start' }}">
                                <div class="flex items-center gap-2 mb-1.5 px-1">
                                    <span class="text-[11px] font-bold text-brand-dark">
                                        {{ $comment->user->name }}
                                    </span>
                                    <span
                                        class="text-[9px] font-light text-brand-slate/60">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>

                                <!-- Chat Bubble -->
                                <div
                                    class="relative max-w-[90%] p-4 text-[13px] font-light leading-relaxed {{ $comment->user_id === auth()->id() ? 'bg-brand-dark text-white rounded-2xl rounded-tr-sm' : 'bg-brand-surface text-brand-slate border border-brand-teal/10 rounded-2xl rounded-tl-sm' }}">
                                    {{ $comment->content }}

                                    @if ($comment->user_id === auth()->id())
                                        <form action="{{ route('member.tasks.comments.destroy', $comment) }}"
                                            method="POST"
                                            class="absolute -left-8 top-1/2 -translate-y-1/2 opacity-0 hover:opacity-100 transition-opacity"
                                            onsubmit="return confirm('Hapus komentar?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-6 h-6 rounded-full bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-100 transition-colors"
                                                title="Delete">
                                                <span class="material-symbols-outlined text-[14px]">delete</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center h-full opacity-60">
                                <div class="w-16 h-16 rounded-full bg-brand-surface flex items-center justify-center mb-4">
                                    <span
                                        class="material-symbols-outlined text-3xl text-brand-slate">speaker_notes_off</span>
                                </div>
                                <p class="text-[13px] text-brand-slate font-light text-center">Belum ada
                                    diskusi.<br />Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Add Comment Form -->
                    <form action="{{ route('member.tasks.comments.store', $task) }}" method="POST"
                        class="mt-auto pt-5 border-t border-brand-teal/10 relative">
                        @csrf
                        <textarea name="content" rows="2" required placeholder="Tulis pesan..."
                            class="w-full text-[13px] rounded-2xl border border-brand-teal/20 bg-brand-surface focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/20 pl-4 pr-12 py-3.5 resize-none outline-none custom-scrollbar text-brand-dark font-medium"></textarea>
                        <button type="submit"
                            class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 mt-2.5 rounded-full bg-brand-orange text-white flex items-center justify-center hover:bg-[#CC6800] transition-colors shadow-md">
                            <span class="material-symbols-outlined text-[16px] -ml-0.5">send</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
