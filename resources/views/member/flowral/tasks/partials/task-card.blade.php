<div data-id="{{ $task->id }}"
    class="kanban-card bg-white p-5 rounded-[24px] border border-brand-teal/10 shadow-[0_2px_10px_-4px_rgba(48,71,78,0.05)] hover:shadow-[0_8px_20px_-8px_rgba(48,71,78,0.1)] hover:border-brand-teal/30 transition-all cursor-grab active:cursor-grabbing group relative">

    <div class="flex justify-between items-start mb-4">
        <!-- Label Project -->
        <span class="{{ $color }} border text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-md">
            {{ $task->project->name ?? 'No Project' }}
        </span>

        <!-- Action Menu (Alpine.js) -->
        <div x-data="{ openMenu: false }" class="relative z-10">
            <button @click="openMenu = !openMenu" @click.away="openMenu = false"
                class="w-6 h-6 flex items-center justify-center rounded-lg text-brand-slate hover:bg-brand-surface hover:text-brand-dark transition-colors opacity-0 group-hover:opacity-100">
                <span class="material-symbols-outlined text-[18px]">more_horiz</span>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="openMenu" x-cloak x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] border border-brand-teal/10 py-1.5 overflow-hidden z-20">
                <a href="{{ route('member.tasks.edit', $task) }}"
                    class="flex items-center gap-2 px-4 py-2 text-[13px] text-brand-dark hover:bg-brand-surface font-medium transition-colors">
                    <span class="material-symbols-outlined text-[16px]">edit</span> Edit
                </a>
                <button type="button"
                    @click="$dispatch('open-delete-modal', { url: '{{ route('member.tasks.destroy', $task) }}', message: 'Yakin hapus task \'{{ $task->title }}\'?' })"
                    class="w-full flex items-center gap-2 px-4 py-2 text-[13px] text-red-500 hover:bg-red-50 font-medium transition-colors">
                    <span class="material-symbols-outlined text-[16px]">delete</span> Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Title & Deskripsi -->
    <a href="{{ route('member.tasks.show', $task) }}"
        class="block font-outfit font-medium text-[16px] mb-1.5 text-brand-dark leading-snug hover:text-brand-orange transition-colors pr-2">
        {{ $task->title }}
    </a>
    <p class="text-[12px] text-brand-slate font-light line-clamp-2 mb-5 leading-relaxed">
        {{ $task->description ?: 'Tidak ada deskripsi.' }}
    </p>

    <!-- Footer Card -->
    <div class="flex justify-between items-center pt-4 border-t border-brand-teal/5">
        <!-- Assignee -->
        <div class="flex items-center gap-2">
            @if ($task->assignee)
                <img alt="Assignee"
                    class="w-7 h-7 rounded-full object-cover ring-2 ring-white border border-brand-teal/10"
                    src="https://ui-avatars.com/api/?name={{ urlencode($task->assignee->name) }}&background=F5FAFB&color=282B2A&bold=true" />
                <span
                    class="text-[11px] font-medium text-brand-dark">{{ explode(' ', trim($task->assignee->name))[0] }}</span>
            @else
                <div
                    class="w-7 h-7 rounded-full bg-brand-surface border border-brand-teal/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[14px] text-brand-slate">person_off</span>
                </div>
                <span class="text-[11px] font-medium text-brand-slate italic">Unassigned</span>
            @endif
        </div>

        <!-- Due Date -->
        <div
            class="flex items-center gap-1 bg-brand-surface px-2 py-1 rounded-md border border-brand-teal/10 {{ $task->due_date && \Carbon\Carbon::parse($task->due_date)->isPast() ? 'text-red-500 bg-red-50 border-red-100' : 'text-brand-slate' }}">
            <span class="material-symbols-outlined text-[13px]">calendar_today</span>
            <span class="text-[10px] font-semibold tracking-wide uppercase">
                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d') : '-' }}
            </span>
        </div>
    </div>
</div>
