@extends('layouts.member')

@section('title', 'AI Assistant')

@section('content')
    <div class="flex flex-col h-[calc(100vh-4rem)] max-w-5xl mx-auto" x-data="copilotChat()">
        <!-- Header -->
        <header class="flex items-center justify-between px-8 py-6 border-b border-brand-teal/5">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-brand-dark flex items-center justify-center shadow-lg shadow-brand-dark/20">
                    <span class="material-symbols-outlined text-white text-[20px]">smart_toy</span>
                </div>
                <div>
                    <h2 class="font-outfit text-xl font-medium text-brand-dark leading-tight">Flowral Copilot</h2>
                    <p class="text-[11px] text-brand-teal font-semibold tracking-widest uppercase">Online</p>
                </div>
            </div>
            <button @click="clearChat()" x-show="messages.length > 0"
                class="px-4 py-2 text-[12px] font-medium bg-brand-surface text-brand-slate hover:text-brand-dark hover:bg-brand-teal/10 rounded-full transition-colors border border-brand-teal/10">
                Clear Chat
            </button>
        </header>

        <!-- Chat Area -->
        <div class="flex-1 overflow-y-auto px-8 pb-10 custom-scrollbar flex flex-col pt-6" id="chat-container">

            <!-- Empty State / Greeting (Muncul jika belum ada pesan) -->
            <div x-show="messages.length === 0"
                class="flex flex-col items-center justify-center h-full my-auto text-center opacity-80 mt-10 mb-16">
                <div
                    class="w-20 h-20 bg-brand-surface rounded-[32px] border border-brand-teal/10 flex items-center justify-center mb-6 shadow-sm">
                    <span class="material-symbols-outlined text-[32px] text-brand-orange">auto_awesome</span>
                </div>
                <h3 class="font-outfit text-3xl font-medium text-brand-dark mb-3">How can I help you today?</h3>
                <p class="text-brand-slate font-light text-sm max-w-md mx-auto">
                    I can help you summarize documents, generate tasks from meeting notes, or find specific assets in your
                    workspace.
                </p>

                <!-- Suggestion Chips -->
                <div class="flex flex-wrap justify-center gap-3 mt-10">
                    <button
                        @click="sendSuggestion('Tolong buatkan contoh deskripsi singkat untuk project baru bernama Aplikasi POS (Point of Sales).')"
                        class="px-5 py-3 bg-white border border-brand-teal/10 rounded-2xl text-[13px] font-light text-brand-dark hover:border-brand-orange hover:shadow-md transition-all text-left flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-orange text-[18px]">lightbulb</span>
                        Suggest a new project
                    </button>
                    <button
                        @click="sendSuggestion('Tolong buatkan daftar 5 task penting (kanban to-do list) untuk pembuatan halaman Login.')"
                        class="px-5 py-3 bg-white border border-brand-teal/10 rounded-2xl text-[13px] font-light text-brand-dark hover:border-brand-orange hover:shadow-md transition-all text-left flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-teal text-[18px]">add_task</span>
                        Create tasks for Login Page
                    </button>
                </div>
            </div>

            <!-- Pesan Dinamis -->
            <template x-for="(msg, index) in messages" :key="index">
                <!-- Flex-row-reverse jika msg.role === 'user' agar posisi di kanan -->
                <div class="flex gap-4 mb-6" :class="msg.role === 'user' ? 'flex-row-reverse' : ''">

                    <!-- Avatar User (Posisi di kanan) -->
                    <div x-show="msg.role === 'user'"
                        class="w-8 h-8 rounded-full bg-brand-surface border border-brand-teal/10 flex-shrink-0 mt-1">
                        <img class="w-full h-full rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=F5FAFB&color=282B2A" />
                    </div>

                    <!-- Avatar AI (Posisi di kiri) -->
                    <div x-show="msg.role === 'ai'"
                        class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center flex-shrink-0 mt-1 shadow-md shadow-brand-dark/20">
                        <span class="material-symbols-outlined text-white text-[14px]">smart_toy</span>
                    </div>

                    <!-- Bubble Text -->
                    <!-- Jika User: background abu, ujung runcing kanan atas (rounded-tr-sm) -->
                    <!-- Jika AI: background putih, ujung runcing kiri atas (rounded-tl-sm) -->
                    <div :class="msg.role === 'user' ?
                        'bg-brand-surface rounded-[24px] rounded-tr-sm p-4 text-[14px] text-brand-dark font-light border border-brand-teal/10 max-w-[80%]' :
                        'bg-white rounded-[24px] rounded-tl-sm p-5 text-[14px] text-brand-dark font-light border border-brand-teal/10 shadow-sm max-w-[80%] leading-relaxed'"
                        x-html="msg.text">
                    </div>

                </div>
            </template>

            <!-- Loading Indicator / Skeleton -->
            <div x-show="isLoading" class="flex gap-4 mb-6 animate-pulse">
                <div class="w-8 h-8 rounded-full bg-brand-dark/40 flex items-center justify-center flex-shrink-0 mt-1">
                    <span class="material-symbols-outlined text-white text-[14px]">smart_toy</span>
                </div>
                <div
                    class="bg-white rounded-[24px] rounded-tl-sm p-5 w-48 border border-brand-teal/10 shadow-sm flex flex-col gap-2">
                    <div class="h-2 bg-brand-slate/20 rounded w-full"></div>
                    <div class="h-2 bg-brand-slate/20 rounded w-3/4"></div>
                    <div class="h-2 bg-brand-slate/20 rounded w-1/2"></div>
                </div>
            </div>

        </div>

        <!-- Input Area -->
        <div class="px-8 pb-8 pt-4 bg-gradient-to-t from-brand-surface to-transparent">
            <div
                class="relative bg-white rounded-[32px] border border-brand-teal/20 shadow-[0_10px_40px_-10px_rgba(48,71,78,0.1)] p-2 flex items-end transition-all focus-within:border-brand-orange focus-within:shadow-[0_10px_40px_-10px_rgba(229,117,0,0.15)]">

                <textarea x-model="userInput" @keydown.enter.prevent="sendMessage()" rows="1"
                    placeholder="Ask Copilot anything..."
                    class="w-full bg-transparent border-none focus:ring-0 resize-none max-h-32 px-3 py-3 text-[14px] font-light text-brand-dark placeholder:text-brand-slate/50 custom-scrollbar"
                    style="min-height: 44px;"></textarea>

                <button @click="sendMessage()" :disabled="isLoading || userInput.trim() === ''"
                    :class="{ 'opacity-50 cursor-not-allowed': isLoading || userInput.trim() === '' }"
                    class="w-10 h-10 flex flex-shrink-0 items-center justify-center text-white bg-brand-dark hover:bg-brand-orange transition-colors mb-1 mr-1 rounded-full shadow-md">
                    <span class="material-symbols-outlined text-[18px]">arrow_upward</span>
                </button>
            </div>
            <p class="text-center text-[10px] text-brand-slate mt-4 font-light">AI can make mistakes. Consider verifying
                important information.</p>
        </div>
    </div>

    <script>
        function copilotChat() {
            return {
                messages: [],
                userInput: '',
                isLoading: false,

                sendSuggestion(text) {
                    this.userInput = text;
                    this.sendMessage();
                },

                sendMessage() {
                    if (this.userInput.trim() === '') return;

                    const promptText = this.userInput;
                    this.messages.push({
                        role: 'user',
                        text: promptText
                    });
                    this.userInput = ''; // clear input
                    this.isLoading = true;
                    this.scrollToBottom();

                    fetch('{{ route('member.ai.chat') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                prompt: promptText
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            this.isLoading = false;
                            if (data.success) {
                                this.messages.push({
                                    role: 'ai',
                                    text: data.message
                                });
                            } else {
                                this.messages.push({
                                    role: 'ai',
                                    text: 'Maaf, terjadi kesalahan.'
                                });
                            }
                            this.scrollToBottom();
                        })
                        .catch(error => {
                            this.isLoading = false;
                            console.error("Error:", error);
                            this.messages.push({
                                role: 'ai',
                                text: 'Error: Gagal menghubungi server.'
                            });
                            this.scrollToBottom();
                        });
                },

                clearChat() {
                    this.messages = [];
                },

                scrollToBottom() {
                    setTimeout(() => {
                        const container = document.getElementById('chat-container');
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    }, 50);
                }
            }
        }
    </script>
@endsection
