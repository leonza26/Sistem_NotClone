@extends('layouts.member')

@section('title', 'Notes & Docs')

@section('content')
    <div class="flex h-[calc(100vh-4rem)]">
        <!-- Left Inner Sidebar (Notes Navigation) -->
        <aside class="w-72 bg-brand-surface flex flex-col p-6 overflow-y-auto border-r border-brand-teal/10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate">
                    Private Docs
                </h3>
                <button
                    class="w-6 h-6 rounded-lg flex items-center justify-center hover:bg-white transition-colors text-brand-slate hover:text-brand-dark shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">add</span>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-xl bg-white text-brand-orange font-medium text-sm shadow-[0_2px_10px_-4px_rgba(48,71,78,0.05)] border border-brand-teal/10 cursor-pointer">
                        <span class="material-symbols-outlined text-[18px]">description</span>
                        <span>Getting Started</span>
                    </div>
                </div>
                <div class="space-y-1">
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-orange">folder</span>
                        <span class="font-light group-hover:font-medium">Design Assets</span>
                        <span
                            class="material-symbols-outlined text-[14px] ml-auto opacity-0 group-hover:opacity-100 transition-opacity">chevron_right</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-orange">folder</span>
                        <span class="font-light group-hover:font-medium">Meeting Notes</span>
                        <span
                            class="material-symbols-outlined text-[14px] ml-auto opacity-0 group-hover:opacity-100 transition-opacity">chevron_right</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-teal">description</span>
                        <span class="font-light group-hover:font-medium">Project Roadmap</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-teal">description</span>
                        <span class="font-light group-hover:font-medium">Brand Guidelines</span>
                    </div>
                </div>

                <div class="pt-6">
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-4">
                        Shared
                    </h3>
                    <div class="space-y-1">
                        <div
                            class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                            <span
                                class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-dark">group</span>
                            <span class="font-light group-hover:font-medium">Team Handbook</span>
                        </div>
                        <div
                            class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white hover:shadow-sm hover:border-brand-teal/10 border border-transparent transition-all text-brand-slate hover:text-brand-dark text-sm cursor-pointer group">
                            <span
                                class="material-symbols-outlined text-[18px] text-brand-slate/60 group-hover:text-brand-teal">description</span>
                            <span class="font-light group-hover:font-medium">Client Onboarding</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-auto pt-6">
                <div class="bg-brand-orange/5 border border-brand-orange/10 rounded-2xl p-4">
                    <p class="text-[11px] text-brand-orange font-bold mb-2 uppercase tracking-wide">
                        Workspace Storage
                    </p>
                    <div class="w-full bg-white/50 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-brand-orange h-full w-[65%] rounded-full shadow-[0_0_10px_rgba(229,117,0,0.5)]">
                        </div>
                    </div>
                    <p class="text-[10px] text-brand-slate mt-2 font-medium">
                        6.5 GB of 10 GB used
                    </p>
                </div>
            </div>
        </aside>

        <!-- Main Editor Area -->
        <section class="flex-grow bg-white overflow-y-auto relative custom-scrollbar">
            <!-- Floating Editor Toolbar (Glassmorphism) -->
            <div
                class="sticky top-0 w-full bg-white/80 backdrop-blur-xl border-b border-brand-teal/10 px-8 lg:px-12 py-3 flex items-center justify-between z-10">
                <div class="flex items-center gap-2 text-brand-slate">
                    <button
                        class="w-8 h-8 rounded-lg hover:bg-brand-surface hover:text-brand-dark transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">format_bold</span>
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg hover:bg-brand-surface hover:text-brand-dark transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">format_italic</span>
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg hover:bg-brand-surface hover:text-brand-dark transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">format_list_bulleted</span>
                    </button>
                    <div class="w-px h-4 bg-brand-teal/10 mx-2"></div>
                    <button
                        class="w-8 h-8 rounded-lg hover:bg-brand-surface hover:text-brand-dark transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">link</span>
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg hover:bg-brand-surface hover:text-brand-dark transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">image</span>
                    </button>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-[11px] text-brand-slate font-light">Saved 2m ago</span>
                    <button
                        class="text-[11px] font-bold uppercase tracking-widest text-brand-dark bg-brand-surface border border-brand-teal/10 px-4 py-2 hover:bg-brand-teal/5 rounded-lg transition-colors">
                        Share
                    </button>
                </div>
            </div>

            <!-- Content Canvas -->
            <div class="max-w-3xl mx-auto py-12 px-8 lg:px-12">
                <!-- Cover Image -->
                <div class="w-full h-48 rounded-[32px] mb-12 overflow-hidden shadow-sm">
                    <img alt="Cover Image" class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=2000&auto=format&fit=crop" />
                </div>

                <!-- Fake Editor Content -->
                <div class="space-y-6">
                    <header>
                        <h1 class="font-outfit text-5xl font-medium text-brand-dark mb-4 leading-tight tracking-tight outline-none"
                            contenteditable="true">
                            Getting Started
                        </h1>
                        <p class="text-lg text-brand-slate font-light leading-relaxed outline-none" contenteditable="true">
                            Welcome to Flowral Notes. This document will help you navigate your new curated environment.
                            Edit me!
                        </p>
                    </header>

                    <div class="prose prose-slate max-w-none pt-4">
                        <h2 class="font-outfit text-2xl font-medium text-brand-dark mt-8 mb-4">
                            Core Principles
                        </h2>
                        <p class="text-brand-slate leading-relaxed font-light mb-4">
                            Our workspace is built on the philosophy of <strong>Mental Clarity</strong>. We believe that
                            information should be displayed with editorial precision, avoiding the clutter of traditional
                            task managers.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
                            <div class="p-6 bg-brand-surface rounded-[24px] border border-brand-teal/10">
                                <span class="material-symbols-outlined text-brand-orange mb-3">architecture</span>
                                <h4 class="font-outfit text-lg font-medium text-brand-dark mb-2">Architectural Integrity
                                </h4>
                                <p class="text-[13px] text-brand-slate font-light">Focus on the structural hierarchy of your
                                    data. Use nesting and tonal layers to define importance.</p>
                            </div>
                            <div class="p-6 bg-brand-surface rounded-[24px] border border-brand-teal/10">
                                <span class="material-symbols-outlined text-brand-teal mb-3">auto_awesome</span>
                                <h4 class="font-outfit text-lg font-medium text-brand-dark mb-2">AI-Driven Insights</h4>
                                <p class="text-[13px] text-brand-slate font-light">Our AI assistant curates your notes into
                                    actionable summaries automatically.</p>
                            </div>
                        </div>

                        <h2 class="font-outfit text-2xl font-medium text-brand-dark mt-10 mb-4">
                            Initial Tasks
                        </h2>
                        <ul class="space-y-4 list-none pl-0">
                            <li class="flex items-start gap-3">
                                <input type="checkbox"
                                    class="mt-1 w-5 h-5 rounded border-brand-teal/20 text-brand-orange focus:ring-brand-orange">
                                <span class="text-brand-slate font-light">Connect your cloud storage in Settings</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <input type="checkbox" checked
                                    class="mt-1 w-5 h-5 rounded border-brand-teal/20 text-brand-orange focus:ring-brand-orange">
                                <span class="text-brand-slate/50 line-through font-light">Create your first project
                                    workspace</span>
                            </li>
                        </ul>

                        <div
                            class="mt-12 p-8 bg-brand-surface rounded-[32px] border-l-4 border-brand-orange relative overflow-hidden">
                            <div class="relative z-10">
                                <p class="italic text-lg font-medium text-brand-dark">
                                    "Design is not just what it looks like and feels like. Design is how it works."
                                </p>
                                <p class="text-[10px] uppercase tracking-widest mt-4 font-bold text-brand-slate">
                                    — Steve Jobs
                                </p>
                            </div>
                            <div class="absolute -right-4 -bottom-4 opacity-[0.03]">
                                <span class="material-symbols-outlined text-9xl">format_quote</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Footer -->
                <footer class="mt-20 pt-8 border-t border-brand-teal/10 flex items-center justify-between pb-20">
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-2">
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://ui-avatars.com/api/?name=Leon+Role&background=F5FAFB&color=282B2A" />
                            <img class="w-8 h-8 rounded-full border-2 border-white"
                                src="https://ui-avatars.com/api/?name=Sarah+Chen&background=F5FAFB&color=282B2A" />
                            <div
                                class="w-8 h-8 rounded-full border-2 border-white bg-brand-surface flex items-center justify-center text-[10px] font-bold text-brand-slate">
                                +4
                            </div>
                        </div>
                        <span class="text-[11px] text-brand-slate font-light">Last edited by <strong
                                class="font-medium text-brand-dark">Sarah Chen</strong> today at 2:45 PM</span>
                    </div>
                </footer>
            </div>
        </section>
    </div>
@endsection
