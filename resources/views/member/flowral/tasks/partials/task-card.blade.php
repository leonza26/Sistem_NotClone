<div data-id="{{ $task->id }}"
    class="bg-surface-container-lowest p-5 rounded-2xl editorial-shadow group border border-transparent hover:border-primary/20 transition-all relative cursor-grab active:cursor-grabbing">
    <div class="flex justify-between items-start mb-4">
        <!-- Label Project -->
        <span class="{{ $color }} text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">
            {{ $task->project->name ?? 'No Project' }}
        </span>

        <!-- Action Menu (Menggunakan Alpine.js) -->
        <div x-data="{ openMenu: false }" class="relative z-10">
            <button @click="openMenu = !openMenu" @click.away="openMenu = false"
                class="opacity-0 group-hover:opacity-100 transition-opacity text-slate-400 hover:text-primary">
                <span class="material-symbols-outlined" data-icon="more_horiz">more_horiz</span>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="openMenu" x-cloak x-transition
                class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-lg border border-slate-100 py-1 overflow-hidden">
                <a href="{{ route('member.tasks.edit', $task) }}"
                    class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary font-medium">Edit</a>
                <button type="button"
                    @click="$dispatch('open-delete-modal', { url: '{{ route('member.tasks.destroy', $task) }}', message: 'Yakin hapus task \'{{ $task->title }}\'?' })"
                    class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <a href="{{ route('member.tasks.show', $task) }}"
        class="block font-headline font-bold text-lg mb-2 text-on-surface leading-snug hover:text-primary transition-colors">
        {{ $task->title }}
    </a>
    <p class="text-sm text-on-surface-variant line-clamp-2 mb-6">
        {{ $task->description ?: 'Tidak ada deskripsi.' }}
    </p>

    <div class="flex justify-between items-center pt-4 border-t border-surface-container">
        <!-- Assignee (Pengguna yang ditugaskan) -->
        <div class="flex items-center gap-2">
            @if ($task->assignee)
                <img alt="Assignee" class="w-6 h-6 rounded-full object-cover ring-2 ring-white"
                    src="https://ui-avatars.com/api/?name={{ urlencode($task->assignee->name) }}&background=random" />
                <span class="text-xs font-bold text-on-surface-variant">{{ $task->assignee->name }}</span>
            @else
                <div class="w-6 h-6 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[12px] text-slate-400"
                        data-icon="person_off">person_off</span>
                </div>
                <span class="text-xs font-medium text-slate-400 italic">Unassigned</span>
            @endif
        </div>

        <!-- Due Date -->
        <div
            class="flex items-center gap-1 {{ $task->due_date && \Carbon\Carbon::parse($task->due_date)->isPast() ? 'text-red-500' : 'text-slate-400' }}">
            <span class="material-symbols-outlined text-sm" data-icon="calendar_today">calendar_today</span>
            <span class="text-[11px] font-bold">
                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d') : '-' }}
            </span>
        </div>
    </div>
</div>
