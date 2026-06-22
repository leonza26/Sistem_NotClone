<ul class="space-y-1.5 pl-4 relative mt-1" style="border-left: 1.5px solid rgba(48,71,78,0.1); margin-left: 10px;">
    @foreach ($notes as $note)
        <li class="relative">
            <div class="flex items-center justify-between group px-3 py-2.5 rounded-xl cursor-pointer transition-all border border-transparent -ml-4"
                :class="{
                    'bg-white shadow-sm ring-1 ring-gray-200': activeNote && activeNote.id ===
                        {{ $note->id }},
                    'hover:bg-gray-100': !(activeNote && activeNote.id === {{ $note->id }})
                }"
                @click="openNote({{ $note->id }})">

                <div class="flex items-center gap-3 flex-1 overflow-hidden">
                    <span class="material-symbols-outlined text-lg transition-colors"
                        :class="{
                            'text-orange-500': activeNote && activeNote.id === {{ $note->id }},
                            'text-gray-400': !(
                                activeNote && activeNote.id === {{ $note->id }})
                        }">
                        description
                    </span>
                    <!-- ID ini sangat penting untuk Auto-Sync Judul -->
                    <span id="sidebar-title-{{ $note->id }}"
                        class="text-sm font-medium truncate select-none transition-colors"
                        :class="{
                            'text-gray-900': activeNote && activeNote.id === {{ $note->id }},
                            'text-gray-600': !(
                                activeNote && activeNote.id === {{ $note->id }})
                        }">
                        {{ $note->title ?? 'Untitled' }}
                    </span>
                </div>

                <div class="flex items-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <button @click.stop="createNote({{ $workspaceId }}, {{ $note->id }})"
                        class="hover:bg-gray-200 p-1 rounded-md text-gray-500 hover:text-gray-900 transition-all"
                        title="Add Sub-Document">
                        <span class="material-symbols-outlined text-base">add</span>
                    </button>

                    <div x-data="{ menuOpen: false }" class="relative" @click.stop>
                        <button @click="menuOpen = !menuOpen" @click.outside="menuOpen = false"
                            class="hover:bg-gray-200 p-1 rounded-md text-gray-500 hover:text-gray-900 transition-all">
                            <span class="material-symbols-outlined text-base">more_vert</span>
                        </button>

                        <div x-show="menuOpen" x-transition.opacity.duration.200ms
                            class="absolute right-0 top-full mt-1 w-36 bg-white border border-gray-200 rounded-xl shadow-lg z-50 py-1 overflow-hidden"
                            style="display: none;">

                            <!-- Panggil Fungsi Modal Rename -->
                            <button
                                @click="menuOpen = false; openRenameModal({{ $note->id }}, '{{ addslashes($note->title) }}')"
                                class="w-full text-left px-4 py-2 text-xs font-medium text-gray-800 hover:bg-gray-50 flex items-center gap-2 transition-colors">
                                <span class="material-symbols-outlined text-sm">edit</span> Rename
                            </button>

                            <div class="h-px w-full bg-gray-100 my-1"></div>

                            <!-- Panggil Global Delete Modal dari member.layout -->
                            <button
                                @click="menuOpen = false; $dispatch('open-delete-modal', { url: '/member/notes/{{ $note->id }}', message: 'Are you sure you want to delete the document \'{{ addslashes($note->title) }}\' and all its sub-documents permanently?' })"
                                class="w-full text-left px-4 py-2 text-xs font-medium text-red-600 hover:bg-red-50 flex items-center gap-2 transition-colors">
                                <span class="material-symbols-outlined text-sm">delete</span> Delete
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            @if ($note->children->count() > 0)
                <div class="mt-1">
                    @include('member.flowral.notes.partials.tree', [
                        'notes' => $note->children,
                        'workspaceId' => $workspaceId,
                    ])
                </div>
            @endif
        </li>
    @endforeach
</ul>
