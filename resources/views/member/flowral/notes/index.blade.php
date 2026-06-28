@extends('layouts.member')

@section('title', 'Documents')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4" x-data="notesApp()">
        <!-- HEADER -->
        <header class="max-w-6xl mb-8">
            <div class="flex items-center gap-2 text-gray-500 text-xs font-semibold uppercase tracking-widest mb-3">
                <span>Workspace</span>
                <span class="w-1 h-1 rounded-full bg-orange-500"></span>
                <span class="text-orange-500 font-bold">Documents</span>
            </div>
            <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-gray-900 leading-tight tracking-tight">
                Your <span class="text-orange-500">Knowledge Base.</span>
            </h2>
        </header>

        <!-- CONTAINER UTAMA -->
        <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden flex"
            style="height: 75vh; min-height: 600px; box-shadow: 0 4px 20px -10px rgba(0,0,0,0.1);">

            <!-- SIDEBAR KIRI (Bisa di Minimize) -->
            <div x-show="sidebarOpen" x-transition:enter="transition-all ease-out duration-300"
                x-transition:enter-start="opacity-0 -ml-72" x-transition:enter-end="opacity-100 ml-0"
                x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 ml-0"
                x-transition:leave-end="opacity-0 -ml-72"
                class="w-72 flex-shrink-0 border-r border-gray-200 bg-gray-50 flex flex-col relative z-20">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                    <span class="font-outfit font-medium text-gray-800 text-lg">Documents</span>
                </div>

                <div class="overflow-y-auto flex-1 py-4 space-y-8 custom-scrollbar">
                    @foreach ($workspaces as $workspace)
                        <div>
                            <div
                                class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-3 px-6 flex justify-between items-center group">
                                <span>{{ $workspace->name }}</span>
                                <button @click="createNote({{ $workspace->id }}, null)"
                                    class="opacity-0 group-hover:opacity-100 hover:bg-gray-200 text-gray-500 hover:text-orange-500 p-1 rounded transition-colors"
                                    title="Add Document">
                                    <span class="material-symbols-outlined text-base">add</span>
                                </button>
                            </div>

                            <div class="px-4">
                                @include('member.flowral.notes.partials.tree', [
                                    'notes' => $workspace->notes,
                                    'workspaceId' => $workspace->id,
                                ])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- AREA KANAN -->
            <div class="flex-1 flex flex-col relative bg-white">

                <!-- State: Kosong -->
                <div x-show="!activeNote" class="flex-1 flex flex-col items-center justify-center text-gray-400 bg-white">
                    <div
                        class="w-24 h-24 rounded-full bg-gray-50 border border-gray-200 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-gray-300 text-5xl">edit_document</span>
                    </div>
                    <h4 class="font-outfit text-xl font-medium text-gray-900 mb-2">No Document Selected</h4>
                    <p class="text-sm font-light">Choose a document from the sidebar or create a new one.</p>
                </div>

                <!-- State: Aktif (Diubah dari x-if ke x-show agar DOM tidak hancur) -->
                <div x-show="activeNote" style="display: none;" class="flex-1 flex flex-col h-full overflow-hidden">

                    <!-- Header Editor & Tombol Save -->
                    <div
                        class="border-b border-gray-200 p-4 px-6 flex justify-between items-center bg-white z-20 shadow-sm">
                        <div class="flex items-center gap-4 flex-1">
                            <button @click="sidebarOpen = !sidebarOpen"
                                class="p-1.5 hover:bg-gray-100 rounded-md text-gray-500 transition-colors"
                                title="Toggle Sidebar">
                                <span class="material-symbols-outlined text-xl"
                                    x-text="sidebarOpen ? 'menu_open' : 'menu'"></span>
                            </button>

                            <input type="text" x-model="activeNote?.title" @input="markDirty()"
                                class="w-full max-w-xl text-2xl font-outfit font-medium text-gray-900 border-none focus:ring-0 p-0 placeholder-gray-300 bg-transparent"
                                placeholder="Document Title...">
                        </div>

                        <!-- Indikator Save & Tombol -->
                        <div class="flex items-center gap-5">
                            <span x-show="isDirty" class="text-xs font-medium text-orange-500 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span> Unsaved changes
                            </span>
                            <span x-show="!isDirty && lastSavedTime"
                                class="text-xs text-gray-500 font-medium flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-base text-green-500">check_circle</span> Saved
                            </span>

                            <button @click="generateSummary()"
                                class="bg-orange-50 text-orange-600 hover:bg-orange-100 hover:text-orange-700 px-4 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-widest transition-all flex items-center gap-2 border border-orange-200 shadow-sm">
                                <span class="material-symbols-outlined text-lg"
                                    :class="isSummarizing ? 'animate-spin' : ''">
                                    auto_awesome
                                </span>
                                <span x-text="isSummarizing ? 'Thinking...' : 'AI Summarize'"></span>
                            </button>

                            <button @click="saveNote()"
                                class="bg-gray-900 hover:bg-orange-500 text-white px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-widest transition-all flex items-center gap-2 border-none"
                                style="box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <span class="material-symbols-outlined text-lg" :class="isSaving ? 'animate-spin' : ''">
                                    <template x-if="isSaving">sync</template>
                                    <template x-if="!isSaving">save</template>
                                </span>
                                <span x-text="isSaving ? 'Saving...' : 'Save'"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Kertas Dokumen (Area Mengetik TinyMCE) -->
                    <!-- KUNCI RAHASIA: Atribut x-ignore ini mencegah Alpine mengganggu/merusak isi Editor -->
                    <div class="flex-1 p-0 relative bg-slate-50" x-ignore>
                        <div class="w-full h-full border-none">
                            <textarea id="tinymce-editor"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RENAME MODAL (AJAX) -->
        <div x-show="renameModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center" x-cloak
            style="display: none;">
            <!-- Backdrop -->
            <div x-show="renameModalOpen" x-transition.opacity class="absolute inset-0 bg-brand-dark/40 backdrop-blur-sm"
                @click="renameModalOpen = false"></div>

            <!-- Panel -->
            <div x-show="renameModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="relative bg-white border border-gray-200 rounded-3xl shadow-2xl w-full max-w-md p-8">
                <div
                    class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center mb-5 border border-orange-100">
                    <span class="material-symbols-outlined text-orange-500 text-2xl">edit_document</span>
                </div>
                <h3 class="text-xl font-outfit font-medium text-gray-900 mb-2">Rename Document</h3>
                <p class="text-gray-500 text-sm font-light mb-6">Enter a new name for this document.</p>

                <input type="text" x-model="renameTitle" @keydown.enter="submitRename()"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all text-sm mb-8 outline-none"
                    placeholder="Document Title...">

                <div class="flex gap-3 justify-end">
                    <button @click="renameModalOpen = false"
                        class="px-5 py-2.5 rounded-xl text-gray-500 font-medium text-sm hover:bg-gray-50 transition-colors">Cancel</button>
                    <button @click="submitRename()"
                        class="px-5 py-2.5 rounded-xl bg-orange-500 text-white font-medium text-sm shadow-lg shadow-orange-500/20 hover:bg-orange-600 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm" x-show="isRenaming" class="animate-spin"
                            style="display: none;">sync</span>
                        <span x-text="isRenaming ? 'Saving...' : 'Save Name'"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- AI SUMMARY MODAL -->
        <div x-show="summaryModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center" x-cloak
            style="display: none;">
            <div x-show="summaryModalOpen" x-transition.opacity class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm"
                @click="summaryModalOpen = false"></div>

            <div x-show="summaryModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="relative bg-white border border-gray-200 rounded-3xl shadow-2xl w-full max-w-2xl p-8 max-h-[80vh] flex flex-col mx-4">
                <div class="flex items-center gap-4 mb-6">
                    <div
                        class="w-12 h-12 rounded-full bg-gray-900 flex items-center justify-center shadow-lg shadow-gray-900/20 flex-shrink-0">
                        <span class="material-symbols-outlined text-white text-[24px]">smart_toy</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-outfit font-medium text-gray-900">AI Summary</h3>
                        <p class="text-gray-500 text-sm font-light">Ringkasan otomatis dari dokumen ini.</p>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto custom-scrollbar pr-2 mb-6">
                    <div class="bg-gray-50 rounded-2xl p-6 text-sm text-gray-800 font-light leading-relaxed border border-gray-100"
                        x-html="aiSummaryResult">
                    </div>
                </div>

                <div class="flex justify-end pt-2 border-t border-gray-100">
                    <button @click="summaryModalOpen = false"
                        class="px-5 py-2.5 rounded-xl bg-orange-500 text-white font-medium text-sm shadow-lg shadow-orange-500/20 hover:bg-orange-600 transition-all">
                        Tutup Ringkasan
                    </button>
                </div>
            </div>
        </div>

        <!-- Gunakan TinyMCE via CDN Open Source (Tanpa API Key, Tanpa Warning) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('notesApp', () => ({
                    activeNote: null,
                    isSaving: false,
                    isDirty: false,
                    sidebarOpen: true,
                    lastSavedTime: '',

                    // STATE UNTUK RENAME MODAL
                    renameModalOpen: false,
                    renameId: null,
                    renameTitle: '',
                    isRenaming: false,

                    init() {
                        const urlParams = new URLSearchParams(window.location.search);
                        const noteId = urlParams.get('note');
                        if (noteId) {
                            this.openNote(noteId);
                        }
                    },

                    async createNote(workspaceId, parentId = null) {
                        try {
                            const response = await fetch('{{ route('member.notes.store') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    workspace_id: workspaceId,
                                    parent_id: parentId,
                                    title: 'New Document'
                                })
                            });
                            const newNote = await response.json();
                            window.location.href = '?note=' + newNote.id;
                        } catch (error) {
                            console.error('Error creating note:', error);
                        }
                    },

                    async openNote(id) {
                        try {
                            if (this.activeNote && this.activeNote.id === id) return;

                            const response = await fetch(`/member/notes/${id}`);
                            this.activeNote = await response.json();

                            const newUrl = new URL(window.location);
                            newUrl.searchParams.set('note', id);
                            window.history.pushState({}, '', newUrl);

                            this.$nextTick(() => {
                                this.initEditor();
                            });
                        } catch (error) {
                            console.error('Error loading note:', error);
                        }
                    },

                    initEditor() {
                        let contentHTML = this.activeNote.content || '';
                        if (contentHTML.startsWith('{"time":') || contentHTML.startsWith('{"blocks":'))
                            contentHTML = '';

                        // Jika TinyMCE sudah dimuat sebelumnya
                        if (tinymce.get('tinymce-editor')) {
                            tinymce.get('tinymce-editor').setContent(contentHTML);
                            tinymce.get('tinymce-editor').undoManager.clear();
                            setTimeout(() => {
                                this.isDirty = false;
                            }, 100);
                            return;
                        }

                        // Setup TinyMCE
                        tinymce.init({
                            selector: '#tinymce-editor',
                            height: '100%',
                            menubar: 'file edit view insert format tools table',
                            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table wordcount',
                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | removeformat | fullscreen',
                            content_style: 'body { font-family: "Inter", sans-serif; font-size: 16px; color: #334155; line-height: 1.8; margin: 20px 40px; } h1,h2,h3 { font-family: "Outfit", sans-serif; color: #0f172a; }',
                            resize: false,
                            branding: false,
                            promotion: false,
                            skin: 'oxide',
                            setup: (editor) => {
                                editor.on('init', () => {
                                    let html = this.activeNote ? (this.activeNote
                                        .content || '') : '';
                                    if (html.startsWith('{"time":')) html = '';
                                    editor.setContent(html);
                                    setTimeout(() => {
                                        this.isDirty = false;
                                    }, 100);
                                });

                                editor.on('input change keyup', (e) => {
                                    this.markDirty();
                                });
                            }
                        });
                    },

                    markDirty() {
                        this.isDirty = true;
                    },

                    async saveNote() {
                        if (!this.activeNote || !tinymce.get('tinymce-editor')) return;

                        this.isSaving = true;
                        const htmlContent = tinymce.get('tinymce-editor').getContent();

                        try {
                            await fetch(`/member/notes/${this.activeNote.id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    title: this.activeNote.title,
                                    content: htmlContent
                                })
                            });

                            const now = new Date();
                            this.lastSavedTime = now.getHours() + ':' + String(now.getMinutes())
                                .padStart(2, '0');
                            this.isDirty = false;

                            // Auto-Sync Judul ke Sidebar
                            const sidebarTitle = document.getElementById('sidebar-title-' + this
                                .activeNote.id);
                            if (sidebarTitle) sidebarTitle.innerText = this.activeNote.title;

                        } catch (error) {
                            console.error('Save error:', error);
                        } finally {
                            this.isSaving = false;
                        }
                    },

                    // FUNGSI UNTUK BUKA MODAL RENAME
                    openRenameModal(id, title) {
                        this.renameId = id;
                        this.renameTitle = title;
                        this.renameModalOpen = true;
                    },

                    // FUNGSI UNTUK MENYIMPAN RENAME
                    async submitRename() {
                        if (!this.renameTitle || !this.renameId) return;
                        this.isRenaming = true;

                        try {
                            await fetch(`/member/notes/${this.renameId}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    title: this.renameTitle
                                })
                            });
                            window.location.reload();
                        } catch (error) {
                            console.error('Rename error:', error);
                        } finally {
                            this.isRenaming = false;
                            this.renameModalOpen = false;
                        }
                    },

                    // AI Summarization
                    isSummarizing: false,
                    summaryModalOpen: false,
                    aiSummaryResult: '',
                    async generateSummary() {
                        if (!this.activeNote || !tinymce.get('tinymce-editor')) return;

                        // Ambil isi tulisan dari TinyMCE
                        const htmlContent = tinymce.get('tinymce-editor').getContent();
                        if (htmlContent.trim() === '') {
                            alert('Dokumen masih kosong, tidak ada yang bisa diringkas.');
                            return;
                        }
                        this.isSummarizing = true;
                        try {
                            const response = await fetch('{{ route('member.ai.summarize_note') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    content: htmlContent
                                })
                            });
                            const data = await response.json();

                            if (data.success) {
                                this.aiSummaryResult = data.summary;
                                this.summaryModalOpen = true; // Buka Pop-up
                            } else {
                                alert('Gagal membuat ringkasan dari server AI.');
                            }
                        } catch (error) {
                            console.error('AI Error:', error);
                            alert('Koneksi ke AI gagal.');
                        } finally {
                            this.isSummarizing = false;
                        }
                    }
                }));
            });
        </script>

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #cbd5e1;
                border-radius: 20px;
            }

            .custom-scrollbar:hover::-webkit-scrollbar-thumb {
                background-color: #94a3b8;
            }

            /* Merapikan UI TinyMCE ke border kita */
            .tox-tinymce {
                border: none !important;
            }

            .tox-editor-header {
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
                padding: 4px 8px !important;
            }
        </style>
    @endsection
