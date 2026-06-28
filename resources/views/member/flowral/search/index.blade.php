@extends('layouts.member')

@section('title', 'Search Results')

@section('content')
    <div class="max-w-[1200px] mx-auto px-8 py-10 h-[calc(100vh-4rem)] overflow-y-auto custom-scrollbar">

        <div class="mb-10">
            <h2 class="font-outfit text-3xl font-medium text-brand-dark tracking-tight">
                Search Results for <span class="text-brand-orange">"{{ $q }}"</span>
            </h2>
            <p class="text-brand-slate font-light mt-2 text-sm">
                Found {{ $projects->count() }} projects, {{ $tasks->count() }} tasks, and {{ $notes->count() }} notes.
            </p>
        </div>

        @if(!$q)
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-brand-slate/30 mb-4">search</span>
                <h3 class="text-xl font-medium text-brand-dark">Type something to search</h3>
                <p class="text-brand-slate font-light text-sm mt-2">Search across your entire workspace ecosystem.</p>
            </div>
        @elseif($projects->isEmpty() && $tasks->isEmpty() && $notes->isEmpty())
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-brand-slate/30 mb-4">manage_search</span>
                <h3 class="text-xl font-medium text-brand-dark">No results found</h3>
                <p class="text-brand-slate font-light text-sm mt-2">Try adjusting your keywords.</p>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Projects Results -->
                <div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px] text-brand-dark">folder</span> Projects
                    </h3>
                    <div class="space-y-3">
                        @forelse($projects as $project)
                            <a href="{{ route('member.projects', $project->id) }}"
                                class="block p-4 bg-white border border-brand-teal/10 rounded-2xl hover:border-brand-orange/30 hover:shadow-md transition-all">
                                <h4 class="font-medium text-brand-dark text-sm">{{ $project->name }}</h4>
                                <p class="text-xs text-brand-slate font-light mt-1 truncate">{{ $project->description }}</p>
                            </a>
                        @empty
                            <div
                                class="p-4 bg-brand-surface/50 border border-dashed border-brand-teal/20 rounded-2xl text-center text-xs text-brand-slate italic">
                                No projects found.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Tasks Results -->
                <div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px] text-brand-dark">task_alt</span> Tasks
                    </h3>
                    <div class="space-y-3">
                        @forelse($tasks as $task)
                            <a href="{{ route('member.tasks.show', $task->id) ?? '#' }}"
                                class="block p-4 bg-white border border-brand-teal/10 rounded-2xl hover:border-brand-orange/30 hover:shadow-md transition-all">
                                <div class="flex items-start gap-3">
                                    <span
                                        class="px-2 py-0.5 rounded text-[9px] font-bold uppercase {{ $task->status == 'done' ? 'bg-green-100 text-green-700' : 'bg-brand-orange/10 text-brand-orange' }}">
                                        {{ $task->status }}
                                    </span>
                                    <div>
                                        <h4 class="font-medium text-brand-dark text-sm">{{ $task->title }}</h4>
                                        <p class="text-xs text-brand-slate font-light mt-1">
                                            {{ $task->project->name ?? 'Unknown Project' }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div
                                class="p-4 bg-brand-surface/50 border border-dashed border-brand-teal/20 rounded-2xl text-center text-xs text-brand-slate italic">
                                No tasks found.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Notes Results -->
                <div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px] text-brand-dark">description</span> Notes
                    </h3>
                    <div class="space-y-3">
                        @forelse($notes as $note)
                            <a href="{{ url('/member/notes?note=' . $note->id) }}"
                                class="block p-4 bg-white border border-brand-teal/10 rounded-2xl hover:border-brand-orange/30 hover:shadow-md transition-all">
                                <h4 class="font-medium text-brand-dark text-sm">{{ $note->title }}</h4>

                                <!-- PERUBAHAN DI BARIS BAWAH INI (project diganti workspace) -->
                                <p class="text-xs text-brand-slate font-light mt-1">{{ $note->workspace->name ?? 'Workspace Note' }}
                                </p>
                            </a>
                        @empty
                            <div
                                class="p-4 bg-brand-surface/50 border border-dashed border-brand-teal/20 rounded-2xl text-center text-xs text-brand-slate italic">
                                No notes found.
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        @endif
    </div>
@endsection