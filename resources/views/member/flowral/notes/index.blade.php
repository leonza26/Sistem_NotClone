<x-member-layout>
    <div class="flex h-[calc(100vh-4rem)]">
        <!-- Left Inner Sidebar (Notes Navigation) -->
        <aside class="w-72 bg-surface-container-low flex flex-col p -6 overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">
                    Private Docs
                </h3>
                <button
                    class="w-6 h-6 rounded flex items-center justify-center hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined text-sm">add</span>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <div
                        class="flex items-center gap-2 px-2 py-1.5 rounded-lg bg-surface-container-lowest text-primary font-semibold text-sm cursor-pointer shadow-sm">
                        <span class="material-symbols-outlined text-sm">description</span>
                        <span>Getting Started</span>
                    </div>
                </div>
                <div class="space-y-1">
                    <div
                        class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary">folder</span>
                        <span>Design Assets</span>
                        <span class="material-symbols-outlined text-xs ml-auto text-slate-300">chevron_right</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary">folder</span>
                        <span>Meeting Notes</span>
                        <span class="material-symbols-outlined text-xs ml-auto text-slate-300">chevron_right</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary">description</span>
                        <span>Project Roadmap</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                        <span
                            class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary">description</span>
                        <span>Brand Guidelines</span>
                    </div>
                </div>
                <div class="pt-6">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant mb-4">
                        Shared
                    </h3>
                    <div class="space-y-1">
                        <div
                            class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                            <span class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary"
                                style="
                                        font-variation-settings: &quot;FILL&quot;
                                            1;
                                    ">group</span>
                            <span>Team Handbook</span>
                        </div>
                        <div
                            class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-surface-container-high transition-colors text-on-surface-variant text-sm cursor-pointer group">
                            <span
                                class="material-symbols-outlined text-sm text-slate-400 group-hover:text-primary">description</span>
                            <span>Client Onboarding</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-auto pt-6">
                <div class="bg-primary/5 rounded-xl p-4">
                    <p class="text-xs text-primary font-semibold mb-1">
                        Workspace Storage
                    </p>
                    <div class="w-full bg-surface-container-high h-1.5 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-[65%]"></div>
                    </div>
                    <p class="text-[10px] text-on-surface-variant mt-2">
                        6.5 GB of 10 GB used
                    </p>
                </div>
            </div>
        </aside>
        <!-- Main Editor Area -->
        <section class="flex-grow bg-surface-container-lowest overflow-y-auto relative">
            <!-- Floating Editor Toolbar (Glassmorphism) -->
            <div class="sticky top-0 w-full glass-nav bg-white/60 px-12 py-3 flex items-center justify-between z-10">
                <div class="flex items-center gap-4 text-slate-400">
                    <button class="hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">format_bold</span>
                    </button>
                    <button class="hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">format_italic</span>
                    </button>
                    <button class="hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">format_list_bulleted</span>
                    </button>
                    <button class="hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">link</span>
                    </button>
                    <div class="w-px h-4 bg-surface-container-high mx-2"></div>
                    <button class="hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">image</span>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-400">Saved 2m ago</span>
                    <button
                        class="text-xs font-bold uppercase tracking-widest text-primary px-3 py-1.5 hover:bg-primary/10 rounded-lg transition-colors">
                        Share
                    </button>
                </div>
            </div>
            <!-- Content Canvas -->
            <div class="max-w-3xl mx-auto py-16 px-12 animate-in fade-in duration-700">
                <!-- Page Cover Image -->
                <div class="w-full h-48 rounded-2xl mb-12 overflow-hidden">
                    <img alt="Modern Workspace" class="w-full h-full object-cover"
                        data-alt="high-angle shot of a minimalist architecture office with large windows, warm wooden furniture, and clean concrete walls"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfyIxdnGPYuGT2mMrtr5pxVDNIgYKaY9mzL37VU_8tWzIBxCSl5o1P9yzrBN5Q8tfg8fl2F-qmkehjp8HolRTVPR5VJXdAcp_ZP2l6NfNNeETNQnOf-775un_ogJpdg7oInLdqN75er3wietQXu7J6HekRy48bxwe4hHWZVqn5y39SUfdUt7YJAjtyJMSKh2AGjw-TFFU837zBlC66e8Ve9zWn8Y8JnIThFZHzSnlYz_AynO0bwAbpheQYCUkEQMKdqLD6siQGUzk" />
                </div>
                <div class="space-y-8">
                    <header>
                        <h1 class="text-5xl font-extrabold tracking-tight text-on-surface mb-4">
                            Getting Started
                        </h1>
                        <p class="text-lg text-on-surface-variant font-medium leading-relaxed">
                            Welcome to the Architectural Curator workspace.
                            This document will help you navigate your new
                            curated environment.
                        </p>
                    </header>
                    <div class="prose prose-slate max-w-none">
                        <h2 class="text-2xl font-bold text-on-surface mt-10 mb-4 border-l-4 border-primary pl-4">
                            Core Principles
                        </h2>
                        <p class="text-on-surface-variant leading-relaxed mb-4">
                            Our workspace is built on the philosophy of
                            **Mental Clarity**. We believe that information
                            should be displayed with editorial precision,
                            avoiding the clutter of traditional task
                            managers.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
                            <div class="p-6 bg-surface-container-low rounded-xl">
                                <span class="material-symbols-outlined text-primary mb-3"
                                    style="
                                            font-variation-settings: &quot;FILL&quot;
                                                1;
                                        ">architecture</span>
                                <h4 class="font-bold text-on-surface mb-2">
                                    Architectural Integrity
                                </h4>
                                <p class="text-sm text-on-surface-variant">
                                    Focus on the structural hierarchy of
                                    your data. Use nesting and tonal layers
                                    to define importance.
                                </p>
                            </div>
                            <div class="p-6 bg-surface-container-low rounded-xl">
                                <span class="material-symbols-outlined text-primary mb-3"
                                    style="
                                            font-variation-settings: &quot;FILL&quot;
                                                1;
                                        ">auto_awesome</span>
                                <h4 class="font-bold text-on-surface mb-2">
                                    AI-Driven Insights
                                </h4>
                                <p class="text-sm text-on-surface-variant">
                                    Our AI assistant curates your notes into
                                    actionable summaries and project
                                    timelines automatically.
                                </p>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-on-surface mt-10 mb-4">
                            Initial Tasks
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <button
                                    class="mt-1 w-5 h-5 rounded border border-outline-variant flex items-center justify-center hover:bg-primary-container/20">
                                    <span class="material-symbols-outlined text-[14px] text-transparent">check</span>
                                </button>
                                <span class="text-on-surface-variant">Connect your cloud storage in
                                    **Settings &gt; Integrations**</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <button
                                    class="mt-1 w-5 h-5 rounded border-2 border-primary bg-primary flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[14px] text-white">check</span>
                                </button>
                                <span class="text-on-surface-variant line-through opacity-50">Create your first project
                                    workspace</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <button
                                    class="mt-1 w-5 h-5 rounded border border-outline-variant flex items-center justify-center hover:bg-primary-container/20">
                                    <span class="material-symbols-outlined text-[14px] text-transparent">check</span>
                                </button>
                                <span class="text-on-surface-variant">Invite your team members via the top
                                    breadcrumb link</span>
                            </li>
                        </ul>
                        <div
                            class="mt-12 p-8 bg-surface text-on-surface-variant rounded-2xl border-l-4 border-tertiary-container relative overflow-hidden">
                            <div class="relative z-10">
                                <p class="italic text-lg font-medium">
                                    "Architecture is the learned game,
                                    correct and magnificent, of forms
                                    assembled in the light."
                                </p>
                                <p class="text-xs uppercase tracking-widest mt-4 font-bold">
                                    — Le Corbusier
                                </p>
                            </div>
                            <div class="absolute -right-4 -bottom-4 opacity-5">
                                <span class="material-symbols-outlined text-9xl">format_quote</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-on-surface mt-12 mb-4">
                            Documentation Standards
                        </h3>
                        <p class="text-on-surface-variant leading-relaxed mb-6">
                            When writing documentation for the curated
                            workspace, adhere to our brand's typography
                            scale:
                        </p>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center justify-between py-2 border-b border-surface-container-high">
                                <span class="font-bold text-on-surface">Page Titles</span>
                                <span class="text-on-surface-variant">Manrope, 2.75rem (display-md)</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-surface-container-high">
                                <span class="font-bold text-on-surface">Section Headers</span>
                                <span class="text-on-surface-variant">Inter, 1.375rem (title-lg)</span>
                            </div>
                            <div class="flex items-center justify-between py-2 border-b border-surface-container-high">
                                <span class="font-bold text-on-surface">Body Text</span>
                                <span class="text-on-surface-variant">Inter, 0.875rem (body-md)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Footer -->
                <footer class="mt-20 pt-8 border-t border-surface-container-high flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-2">
                            <img alt="Collaborator"
                                class="w-8 h-8 rounded-full border-2 border-surface-container-lowest"
                                data-alt="close-up portrait of a woman smiling with soft natural lighting and blurred greenery in background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHjWX3t4_2KixBPLUOfRlKipO7SKSg51Cqu1WpXRbxbp3E2O9RY40eyV_-kwVBVpxIrhZIl9xqM_w7vjr4bIlsZ60lB1k2xWH9IsZ-5LBKxq07tUgGX0yt-x2C-n26Ydo93fvkarXemUmLQG2tKUaxNqmQzwMHuy7yCb_0IQoe2EUgP27tZxuNxICjkL7JfGFc4Vaxu3eGBfTfxNlf5KwuUxpmLN4tGZYdNGFFf2G9gVrFFcVZ4MOFHdSfc2kxcxlWfRsF3Q0-QkA" />
                            <img alt="Collaborator"
                                class="w-8 h-8 rounded-full border-2 border-surface-container-lowest"
                                data-alt="headshot of a man with glasses looking at the camera in a modern office interior"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAFQKgxabVm0q85UuFXPbAKQ5ezVYosqpNM28V-NpG_r9akb7L34pwhfvOw_Oirxj44wrK5cMDx0eFKgoXL90F6pFIyBnoUaZ_A_z5Oqx6JB1MFxwvcwf9VeK7b_fMCGIvPZbSvpO1_S7-WRD0rB7sWNXHexCb3xFD-0VXuOMxwL-VN2TMVXRfJb4YQVQmex3fD4jDdVdDOxGdJIoPsuuhSuApCKAsUptk4hUTOKq2jb_-563s79X8kj_pE6g2WOKAwGK_bByfwpU" />
                            <div
                                class="w-8 h-8 rounded-full border-2 border-surface-container-lowest bg-primary-fixed flex items-center justify-center text-[10px] font-bold text-on-primary-fixed">
                                +4
                            </div>
                        </div>
                        <span class="text-xs text-on-surface-variant">Last edited by **Sarah Chen** today at 2:45
                            PM</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            class="p-2 hover:bg-surface-container-low rounded-lg text-on-surface-variant transition-colors">
                            <span class="material-symbols-outlined text-sm">more_horiz</span>
                        </button>
                    </div>
                </footer>
            </div>
        </section>
        <!-- Right Side Context Panel (Asymmetric Editorial Element) -->
        <aside
            class="w-16 bg-surface-container-lowest border-l border-surface-container-low flex flex-col items-center py-6 gap-6">
            <button
                class="w-10 h-10 rounded-full flex items-center justify-center bg-primary text-white shadow-lg hover:scale-105 transition-all">
                <span class="material-symbols-outlined">add</span>
            </button>
            <div class="w-8 h-[1px] bg-surface-container-high"></div>
            <button class="text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">chat_bubble</span>
            </button>
            <button class="text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">calendar_today</span>
            </button>
            <button class="text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">star</span>
            </button>
        </aside>
    </div>
</x-member-layout>
