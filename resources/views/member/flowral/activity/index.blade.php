<x-member-layout>
    <div class="max-w-7xl px-10">
        <!-- Header Section -->
        <div class="mb-12">
            <div class="flex items-center gap-2 mb-4">
                <span class="text-xs font-semibold tracking-widest text-primary uppercase">Workspace</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span class="text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Stream</span>
            </div>
            <h2 class="text-5xl font-extrabold tracking-tight text-on-surface mb-4">
                Activity Timeline
            </h2>
            <p class="text-lg text-on-surface-variant leading-relaxed max-w-2xl">
                A curated flow of updates and milestones across your
                production environment.
            </p>
        </div>w
        <!-- Bento Layout Activity Grid (Asymmetric) -->
        <div class="grid grid-cols-12 gap-8">
            <!-- Main Timeline Canvas -->
            <div class="col-span-12 lg:col-span-8 bg-surface-container-lowest rounded-xl p-8 relative overflow-hidden">
                <!-- Vertical Line -->
                <div class="absolute left-12 top-0 bottom-0 w-[1px] bg-surface-container"></div>
                <div class="space-y-12 relative">
                    <!-- Timeline Group: Today -->
                    <div>
                        <h3 class="ml-16 text-xs font-bold text-primary-container tracking-widest uppercase mb-8">
                            Today
                        </h3>
                        <!-- Activity Item 1 -->
                        <div class="relative flex gap-6 items-start group">
                            <div
                                class="relative z-10 flex items-center justify-center w-10 h-10 rounded-full bg-primary text-white shadow-lg shadow-primary/20">
                                <span class="material-symbols-outlined text-[20px]" data-icon="add_task">add_task</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-on-surface font-semibold">
                                        <span class="text-primary hover:underline cursor-pointer">Marcus Thorne</span>
                                        created
                                        <span class="font-bold">Q4 Project Roadmap</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-medium text-slate-400 uppercase tracking-tighter">10:24
                                        AM</span>
                                </div>
                                <div
                                    class="bg-surface-container-low rounded-lg p-4 transition-all group-hover:scale-[0.99] duration-200">
                                    <p class="text-sm text-on-surface-variant leading-snug">
                                        Added 12 new milestones and
                                        assigned structural leads for
                                        the architectural phase.
                                    </p>
                                    <div class="mt-3 flex gap-2">
                                        <span
                                            class="px-2 py-1 bg-surface-container text-[10px] font-bold rounded text-slate-500">PLANNING</span>
                                        <span
                                            class="px-2 py-1 bg-surface-container text-[10px] font-bold rounded text-slate-500">Q4-2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Activity Item 2 -->
                        <div class="relative flex gap-6 items-start mt-10 group">
                            <div
                                class="relative z-10 flex items-center justify-center w-10 h-10 rounded-full bg-secondary-container text-primary shadow-sm">
                                <span class="material-symbols-outlined text-[20px]"
                                    data-icon="edit_note">edit_note</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-on-surface font-semibold">
                                        <span class="text-primary hover:underline cursor-pointer">Sarah Jenkins</span>
                                        updated
                                        <span class="font-bold">Style Guide v2.4</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-medium text-slate-400 uppercase tracking-tighter">09:15
                                        AM</span>
                                </div>
                                <div class="p-2 border-l-4 border-primary-container ml-1">
                                    <p class="text-sm italic text-on-surface-variant">
                                        "Refined the tonal layering
                                        tokens to include atmospheric
                                        teals for the curation
                                        dashboard."
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Activity Item 3 (Image Upload) -->
                        <div class="relative flex gap-6 items-start mt-10 group">
                            <div
                                class="relative z-10 flex items-center justify-center w-10 h-10 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant shadow-sm">
                                <span class="material-symbols-outlined text-[20px]" data-icon="image">image</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-on-surface font-semibold">
                                        <span class="text-primary hover:underline cursor-pointer">Elena Rossi</span>
                                        uploaded
                                        <span class="font-bold">4 Curation Assets</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-medium text-slate-400 uppercase tracking-tighter">08:30
                                        AM</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2 mt-2">
                                    <div
                                        class="aspect-square bg-slate-100 rounded-lg overflow-hidden ring-1 ring-inset ring-black/5">
                                        <img alt="Asset 1" class="w-full h-full object-cover"
                                            data-alt="architectural sketch of a modern pavilion with clean lines and soft shadows"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5Avw1w64vUrwEC2wnnxExHjXQxZYs1Ejmxdhz8NLTdoBiM3x-t7d5e8WCdjiowq_PtIPiRC7-wGQBJuFE0pCcUu-sA1nY6xIJM9o9BWWveRcGgKfFCw7vNcWM5qKfv_5Let1ZuXNQA0Ymub_fkglKPmvHljXNP7JnrshvqLRR02ADUKWspEPRPukQ7gNA0KS__rm_5-0Xl1F1LKwu8ViAPfgpKidWP4nCpq_zcAvuVehHCWQDsHeKSIFfbrNvqWDZnmKnIeMKGVs" />
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-100 rounded-lg overflow-hidden ring-1 ring-inset ring-black/5">
                                        <img alt="Asset 2" class="w-full h-full object-cover"
                                            data-alt="macro texture photo of brushed limestone with soft neutral lighting"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUbea4OTCsKp0ij6WqqOw-33nZsUaRlK6bLY7ya-YuQHNxzmqovzc6ErBE8JDZVSmQ3Wo-EISg74lkytX4xxwG9donP-l8uUB24HhnAmC6FttDu7zXXA9NvjSWsUseu3nyLiZ-UVaJeds8oOfYGWCjfeq8tAvyAbHkRJoiydQf4nwXljWw4JvVnJfDeZHL_zKRerGkRrHqljbHRbMUgtISF0jeuEeEbZVQoWUEnNtFJQUaBYCOll9qNxzwmtoBT1GL-AsYMzjjbM4" />
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-100 rounded-lg overflow-hidden ring-1 ring-inset ring-black/5">
                                        <img alt="Asset 3" class="w-full h-full object-cover"
                                            data-alt="minimalist interior design concept with large windows and natural wood elements"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDX33W3zfisePdyV-5DN7wxjJ8GB2rsnbsNWWdPZ7Jfnjsdi-jaKW-HH5r8pmXtkgvDNU75pvg6v9fF6rxKtVQKZ98t5LE-agXZLGDCayl28oer_Za8ZVMygnrWkKv0vQZcIx58tfHkiauvcAYU9eC_mjcGAAEItHpGXZV-DGLBZBAKKmOJhRd4ZabwaEwmjxP-pPeXK4zBZ7qKYT9Ea0XKiCHIujmT0llj314AkvMrDzr2-YQr_A8FhSC-IakUQOYaRd5ome1nOU" />
                                    </div>
                                    <div
                                        class="aspect-square bg-slate-100 rounded-lg overflow-hidden ring-1 ring-inset ring-black/5 flex items-center justify-center text-xs font-bold text-slate-400">
                                        +1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline Group: Yesterday -->
                    <div>
                        <h3 class="ml-16 text-xs font-bold text-slate-400 tracking-widest uppercase mb-8">
                            Yesterday
                        </h3>
                        <!-- Activity Item 4 -->
                        <div class="relative flex gap-6 items-start group">
                            <div
                                class="relative z-10 flex items-center justify-center w-10 h-10 rounded-full bg-surface-container text-on-surface-variant">
                                <span class="material-symbols-outlined text-[20px]"
                                    data-icon="smart_toy">smart_toy</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-on-surface font-semibold">
                                        <span class="text-primary font-bold">AI Assistant</span>
                                        optimized
                                        <span class="font-bold">Project Metadata</span>
                                    </p>
                                    <span class="text-[10px] font-medium text-slate-400 uppercase tracking-tighter">4:50
                                        PM</span>
                                </div>
                                <div
                                    class="bg-surface-container-low/50 rounded-lg p-3 border border-dashed border-outline-variant/30">
                                    <p class="text-sm text-on-surface-variant italic">
                                        Automated tagging completed for
                                        45 files in "Production
                                        Workspace".
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Activity Item 5 -->
                        <div class="relative flex gap-6 items-start mt-10 group">
                            <div
                                class="relative z-10 flex items-center justify-center w-10 h-10 rounded-full bg-error-container text-error">
                                <span class="material-symbols-outlined text-[20px]" data-icon="flag">flag</span>
                            </div>
                            <div class="flex-1 pt-1">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-on-surface font-semibold">
                                        <span class="text-primary hover:underline cursor-pointer">Marcus Thorne</span>
                                        flagged
                                        <span class="font-bold text-error">Critical Delay</span>
                                    </p>
                                    <span class="text-[10px] font-medium text-slate-400 uppercase tracking-tighter">1:12
                                        PM</span>
                                </div>
                                <p class="text-sm text-on-surface-variant">
                                    Vendor approval pending for Site
                                    Phase A. Re-assigned to Sarah for
                                    follow-up.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contextual Sidebar / Stats -->
            <div class="col-span-12 lg:col-span-4 space-y-8">
                <!-- Insights Card -->
                <div
                    class="bg-gradient-to-br from-primary to-primary-container rounded-xl p-8 text-white shadow-xl shadow-primary/10">
                    <h4 class="text-sm font-bold uppercase tracking-widest opacity-80 mb-6">
                        Weekly Pulse
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <p class="text-4xl font-extrabold">142</p>
                            <p class="text-xs font-medium opacity-70 mt-1 uppercase tracking-tight">
                                Total Activities
                            </p>
                        </div>
                        <div class="h-[2px] bg-white/20 w-full"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xl font-bold">24</p>
                                <p class="text-[10px] opacity-70 uppercase">
                                    Tasks Created
                                </p>
                            </div>
                            <div>
                                <p class="text-xl font-bold">89</p>
                                <p class="text-[10px] opacity-70 uppercase">
                                    Files Curated
                                </p>
                            </div>
                            <div>
                                <p class="text-xl font-bold">2.4h</p>
                                <p class="text-[10px] opacity-70 uppercase">
                                    Avg Response
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team Status List (No Borders) -->
                <div class="bg-surface-container-high/40 rounded-xl p-6">
                    <h4 class="text-xs font-bold text-on-surface uppercase tracking-widest mb-6 px-2">
                        Live Collaborators
                    </h4>
                    <div class="space-y-2">
                        <div
                            class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-lowest transition-colors cursor-pointer group">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <img class="w-8 h-8 rounded-full bg-secondary-container"
                                        data-alt="portrait of an elegant professional in a creative studio setting"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPyPJFqD1IdEAyUr7fj2bCBG4vhlRJvuKir1lh3xSQ8piy4rfbkC36DyL9jTAmXIplcxruBrPuhG1RA0nYWd3nrJSkb1rebdVJ5MHztYm4jEw9dCyMCEak4T3o4jB5nq5xmYwoVfnZeKLYX-7eDVkJtNPtggDGVbBuk74ywm554z1j1O9RcWxFsBky0gfWtXNDTPZ81eMLXMZWK_tjq9lpYVXlrio4Jevc7HL-9ek2bo4mfEfLgL2sXEVY49Oa52uUElNRXj2mW4w" />
                                    <span
                                        class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-surface rounded-full"></span>
                                </div>
                                <span class="text-sm font-semibold text-on-surface">Marcus Thorne</span>
                            </div>
                            <span
                                class="text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Curating</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-lowest transition-colors cursor-pointer group">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <img class="w-8 h-8 rounded-full bg-primary-fixed"
                                        data-alt="close-up of a creative designer working in a bright modern office"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0Dw3bQvsTdybFK29tpwLLkK7F2MF79bImMjsQdsq4TpbhE_JtK7uMgCrJ2QcLZyY6keVzPQvU9TyVbJrWN7W9X82iHuNQwFQd4o6TciBD_rWuW9W_NbPjbWB_ZmRj-5wk-m5067O94WM0fpy2BQkiejVM6_3hfadC_4wWTdt9SFRLmiZO_8BXSGCFbP6zxaTLGoigzQp2TE0mU0rDWI6i_2zY2S78lRHwydM4q4nGYjJNaisNBphxXXGP9vriKxLJBWdbs_arZCE" />
                                    <span
                                        class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-surface rounded-full"></span>
                                </div>
                                <span class="text-sm font-semibold text-on-surface">Sarah Jenkins</span>
                            </div>
                            <span
                                class="text-[10px] text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">Writing</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-lowest transition-colors cursor-pointer group">
                            <div class="flex items-center gap-3">
                                <div class="relative">
                                    <img class="w-8 h-8 rounded-full bg-tertiary-fixed"
                                        data-alt="professional woman in a stylish workspace with soft morning light"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYM8SpQO0nV3930UW59uOzaEzsQ5Wg7i1FxondpEwsV3PoUBXxEqkk-t2_c6HAWDayXR2ie70m1Nz71Jxqm80IqHyGvqd2WeIZcprDMzUf6gskszLTgg_qcfyQjX-dDpcGWD53_eYadU-bIXsxXbyOayyyW8hYF5U4OyuUjTtuJygyW86OTb4WP7uRy8r209dPfN1xQZ0sih_oEVuUYqrQ85SaGTkETLwEG1drsY1WtV7aMo9onGTCdYA4QWgOhuNIMjfkOYF2QvY" />
                                    <span
                                        class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-slate-300 border-2 border-surface rounded-full"></span>
                                </div>
                                <span class="text-sm font-semibold text-on-surface opacity-60">Elena Rossi</span>
                            </div>
                            <span class="text-[10px] text-slate-400">Away</span>
                        </div>
                    </div>
                </div>
                <!-- Filter / Filter Actions -->
                <div class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-outline-variant/10">
                    <h4 class="text-xs font-bold text-on-surface uppercase tracking-widest mb-4">
                        Filters
                    </h4>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-3 py-1.5 bg-primary text-white rounded-full text-xs font-semibold">
                            Everything
                        </button>
                        <button
                            class="px-3 py-1.5 bg-surface-container text-on-surface-variant rounded-full text-xs font-medium hover:bg-surface-container-high">
                            Tasks
                        </button>
                        <button
                            class="px-3 py-1.5 bg-surface-container text-on-surface-variant rounded-full text-xs font-medium hover:bg-surface-container-high">
                            Assets
                        </button>
                        <button
                            class="px-3 py-1.5 bg-surface-container text-on-surface-variant rounded-full text-xs font-medium hover:bg-surface-container-high">
                            Mentions
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-member-layout>
