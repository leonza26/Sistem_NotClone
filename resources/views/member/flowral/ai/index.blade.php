@extends('layouts.member')

@section('title', 'AI Assistant')

@section('content')
    <div class="flex flex-col h-[calc(100vh-4rem)] max-w-5xl mx-auto">
        <!-- Header -->
        <header class="flex items-center justify-between px-8 py-6">
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
            <button
                class="px-4 py-2 text-[12px] font-medium bg-brand-surface text-brand-slate hover:text-brand-dark hover:bg-brand-teal/10 rounded-full transition-colors border border-brand-teal/10">
                Clear Chat
            </button>
        </header>

        <!-- Chat Area -->
        <div class="flex-1 overflow-y-auto px-8 pb-10 custom-scrollbar flex flex-col">
            <!-- Empty State / Greeting -->
            <div class="flex flex-col items-center justify-center h-full my-auto text-center opacity-80 mt-10 mb-16">
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
                        class="px-5 py-3 bg-white border border-brand-teal/10 rounded-2xl text-[13px] font-light text-brand-dark hover:border-brand-orange hover:shadow-md transition-all text-left flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-orange text-[18px]">summarize</span>
                        Summarize the Q4 Roadmap
                    </button>
                    <button
                        class="px-5 py-3 bg-white border border-brand-teal/10 rounded-2xl text-[13px] font-light text-brand-dark hover:border-brand-orange hover:shadow-md transition-all text-left flex items-center gap-3">
                        <span class="material-symbols-outlined text-brand-teal text-[18px]">add_task</span>
                        Create tasks from last meeting
                    </button>
                </div>
            </div>

            <!-- Sample Chat Bubble (Hidden by default, just to show how it looks) -->
            <div class="flex gap-4 mb-6">
                <div class="w-8 h-8 rounded-full bg-brand-surface border border-brand-teal/10 flex-shrink-0 mt-1">
                    <img class="w-full h-full rounded-full"
                        src="https://ui-avatars.com/api/?name=Leon+Role&background=F5FAFB&color=282B2A" />
                </div>
                <div
                    class="bg-brand-surface rounded-2xl rounded-tl-sm p-4 text-[14px] text-brand-dark font-light border border-brand-teal/10">
                    Can you summarize the recent changes to the Style Guide?
                </div>
            </div>

            <div class="flex gap-4 mb-6">
                <div
                    class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center flex-shrink-0 mt-1 shadow-md shadow-brand-dark/20">
                    <span class="material-symbols-outlined text-white text-[14px]">smart_toy</span>
                </div>
                <div
                    class="bg-white rounded-[24px] rounded-tl-sm p-5 text-[14px] text-brand-dark font-light border border-brand-teal/10 shadow-sm max-w-[90%] leading-relaxed">
                    Certainly! Based on the recent activity, <strong>Sarah Jenkins</strong> updated the <span
                        class="text-brand-orange font-medium cursor-pointer">Style Guide v2.4</span> today at 09:15 AM.
                    <br><br>
                    The key change was: <em>"Refined the tonal layering tokens to include atmospheric teals for the curation
                        dashboard."</em>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="px-8 pb-8 pt-4 bg-gradient-to-t from-brand-surface to-transparent">
            <div
                class="relative bg-white rounded-[32px] border border-brand-teal/20 shadow-[0_10px_40px_-10px_rgba(48,71,78,0.1)] p-2 flex items-end transition-all focus-within:border-brand-orange focus-within:shadow-[0_10px_40px_-10px_rgba(229,117,0,0.15)]">
                <button
                    class="w-10 h-10 flex items-center justify-center text-brand-slate hover:text-brand-dark transition-colors mb-1 ml-1 rounded-full hover:bg-brand-surface">
                    <span class="material-symbols-outlined text-[20px]">attach_file</span>
                </button>
                <textarea rows="1" placeholder="Ask Copilot anything..."
                    class="w-full bg-transparent border-none focus:ring-0 resize-none max-h-32 px-3 py-3 text-[14px] font-light text-brand-dark placeholder:text-brand-slate/50 custom-scrollbar"
                    style="min-height: 44px;"></textarea>
                <button
                    class="w-10 h-10 flex items-center justify-center text-white bg-brand-dark hover:bg-brand-orange transition-colors mb-1 mr-1 rounded-full shadow-md">
                    <span class="material-symbols-outlined text-[18px]">arrow_upward</span>
                </button>
            </div>
            <p class="text-center text-[10px] text-brand-slate mt-4 font-light">AI can make mistakes. Consider verifying
                important information.</p>
        </div>
    </div>
@endsection
