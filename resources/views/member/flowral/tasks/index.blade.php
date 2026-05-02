<x-member-layout>
    <!-- Canvas -->
    <div class=" max-w-7xl">
        <!-- Editorial Header -->
        <div class="flex justify-between items-end mb-12">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-on-surface-variant font-label text-xs uppercase tracking-widest">Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                    <span class="text-on-surface-variant font-label text-xs uppercase tracking-widest">Q3 Project
                        Alpha</span>
                </div>
                <h2 class="font-headline text-5xl font-extrabold tracking-tight text-on-surface">
                    Tasks
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-surface-container-highest text-on-surface rounded-lg font-medium text-sm hover:bg-surface-container-high transition-colors">
                    <span class="material-symbols-outlined text-lg" data-icon="filter_list">filter_list</span>
                    Filter
                </button>
                <button
                    class="flex items-center gap-2 px-6 py-2.5 bg-gradient-to-br from-primary to-primary-container text-white rounded-lg font-bold text-sm editorial-shadow hover:scale-[1.02] active:scale-[0.98] transition-all">
                    <span class="material-symbols-outlined text-lg" data-icon="add">add</span>
                    New Task
                </button>
            </div>
        </div>
        <!-- Kanban Board -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Column: Todo -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-slate-300"></span>
                        <h3 class="font-headline text-lg font-bold">
                            Todo
                        </h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">4</span>
                    </div>
                    <button class="text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined" data-icon="more_horiz">more_horiz</span>
                    </button>
                </div>
                <div
                    class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all">
                    <div class="space-y-4">
                        <!-- Task Card 1 -->
                        <div
                            class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow group cursor-grab active:cursor-grabbing border border-transparent hover:border-primary/10 transition-all">
                            <div class="flex justify-between items-start mb-4">
                                <span
                                    class="bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">Research</span>
                                <button class="opacity-0 group-hover:opacity-100 transition-opacity text-slate-300">
                                    <span class="material-symbols-outlined"
                                        data-icon="drag_indicator">drag_indicator</span>
                                </button>
                            </div>
                            <h4 class="font-headline font-bold text-lg mb-2 text-on-surface leading-snug">
                                Competitor Analysis for Q4 Launch
                            </h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-6">
                                Deep dive into emerging architectural
                                software trends in the Nordic market.
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                                <div class="flex items-center gap-2">
                                    <img alt="Assignee" class="w-6 h-6 rounded-full object-cover"
                                        data-alt="Close-up portrait of a smiling professional woman with glasses, soft natural daylight, office interior background, high-end editorial style"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoPHVIPGLUbW_WmrxFZ0HlGpMDJtsvaMki5usZHdoF4qSZGxqgDwv3QW5y4ku4BfAi1Bjzr1qYPA_MKj4iphgYczMR9OLbta9fpcpZ0Kww7Ln2lyuN9xh-LbDMFkFGajENKwuAkzchwlS5QO7A1QnlB1XkDkL29qgA8_nu0isOHcWOxQ2sGyQfgrpZP8hvyb01DydEKi_jG8fdGvzs9HvZKEZ-HFTB1H_magpzDAsVTsFzxTA8XrEVrpLUezboncsVjWj1Po35dI8" />
                                    <span class="text-xs font-medium text-on-surface-variant">Elena K.</span>
                                </div>
                                <div class="flex items-center gap-1 text-slate-400">
                                    <span class="material-symbols-outlined text-sm"
                                        data-icon="calendar_today">calendar_today</span>
                                    <span class="text-[11px] font-semibold">Oct 12</span>
                                </div>
                            </div>
                        </div>
                        <!-- Task Card 2 -->
                        <div
                            class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow group cursor-grab active:cursor-grabbing border border-transparent hover:border-primary/10 transition-all">
                            <div class="flex justify-between items-start mb-4">
                                <span
                                    class="bg-tertiary/10 text-tertiary text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">Urgent</span>
                                <button class="opacity-0 group-hover:opacity-100 transition-opacity text-slate-300">
                                    <span class="material-symbols-outlined"
                                        data-icon="drag_indicator">drag_indicator</span>
                                </button>
                            </div>
                            <h4 class="font-headline font-bold text-lg mb-2 text-on-surface leading-snug">
                                API Integration Review
                            </h4>
                            <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                                <div class="flex items-center gap-2">
                                    <img alt="Assignee" class="w-6 h-6 rounded-full object-cover"
                                        data-alt="Modern professional headshot of a young man with curly hair, minimal background, soft lighting, professional aesthetic"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7gYP_JlHfNCQGbAlZxyUcOAMEOp1edZkRtI_LiIJmf54qR3cwxWICR0_0lLdJRatIJun0iz1yGsXmAlpZLTkAh_lAyImU7gOHyaDT2OoMG1vptpj0vmz_2Wm8aVcIfeT5hnROXTDVKV3iCE2MM1X5c-TaiOjnzCiQKczmplq4xVCAochXxyV21OBaHNZ0nvPAPgzyjeb3l5byVvrqYSqhWta3Bz3jjh4zXkl3jKOlWqgPog-Fh6sd4hkxzspOZ2O_WBg4CdrJki0" />
                                    <span class="text-xs font-medium text-on-surface-variant">Marcus V.</span>
                                </div>
                                <div class="flex items-center gap-1 text-tertiary">
                                    <span class="material-symbols-outlined text-sm"
                                        data-icon="calendar_today">calendar_today</span>
                                    <span class="text-[11px] font-semibold">Tomorrow</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column: In Progress -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-primary-container"></span>
                        <h3 class="font-headline text-lg font-bold">
                            In Progress
                        </h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">2</span>
                    </div>
                    <button class="text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined" data-icon="more_horiz">more_horiz</span>
                    </button>
                </div>
                <div
                    class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all">
                    <div class="space-y-4">
                        <!-- Task Card 3 -->
                        <div
                            class="bg-surface-container-lowest p-6 rounded-2xl editorial-shadow group cursor-grab active:cursor-grabbing border border-primary/20 transition-all ring-1 ring-primary/5">
                            <div class="flex justify-between items-start mb-4">
                                <span
                                    class="bg-secondary-container text-on-secondary-container text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">Design</span>
                                <button class="opacity-0 group-hover:opacity-100 transition-opacity text-slate-300">
                                    <span class="material-symbols-outlined"
                                        data-icon="drag_indicator">drag_indicator</span>
                                </button>
                            </div>
                            <h4 class="font-headline font-bold text-lg mb-2 text-on-surface leading-snug">
                                UI Design System Refactor
                            </h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-6">
                                Updating the color tokens and typography
                                hierarchy for improved accessibility.
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                                <div class="flex items-center gap-2">
                                    <img alt="Assignee" class="w-6 h-6 rounded-full object-cover"
                                        data-alt="Professional man's headshot, soft focused office background, cinematic lighting, editorial quality"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8b41tnX6spTTW4hxaq6yEbD38XJyeOZtRRlx_yhgv75P4ziDdfYPyzG1oYxUvB9zfd-nFp6f-UkFnQWFqmMnKlZW3ptoTH0beLVYZp9cLzcesynVuQv8qrD1IA8Fh_WXtZsPBt6ZnN68cvt9VaRzQkZhxspP6NQrlnHUWb6e_4Vdzq4CJwi_vEhGDaBEBr8X_raJtdRMbhvI7mcUhW8I_Gh8AAAlEJ-X4s2Quw1Z_gEkdF0E31NljXcv6cSo9wWAOS5MB6SjIecg" />
                                    <span class="text-xs font-medium text-on-surface-variant">David L.</span>
                                </div>
                                <div class="flex items-center gap-1 text-slate-400">
                                    <span class="material-symbols-outlined text-sm"
                                        data-icon="calendar_today">calendar_today</span>
                                    <span class="text-[11px] font-semibold">Oct 15</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column: Done -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        <h3 class="font-headline text-lg font-bold">
                            Done
                        </h3>
                        <span
                            class="bg-surface-container-high text-on-surface-variant px-2 py-0.5 rounded text-xs font-bold">12</span>
                    </div>
                    <button class="text-slate-400 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined" data-icon="more_horiz">more_horiz</span>
                    </button>
                </div>
                <div
                    class="bg-surface-container-low/50 rounded-2xl p-4 min-h-[600px] border-2 border-dashed border-transparent hover:border-outline-variant/30 transition-all">
                    <div class="space-y-4">
                        <!-- Task Card 4 (Completed State) -->
                        <div
                            class="bg-surface-container-lowest/60 p-6 rounded-2xl border border-transparent grayscale-[0.5] opacity-80 group cursor-grab active:cursor-grabbing transition-all">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-teal-600 text-base"
                                        data-icon="check_circle"
                                        style="
                                        font-variation-settings: &quot;FILL&quot;
                                            1;
                                    ">check_circle</span>
                                    <span
                                        class="bg-surface-container-high text-on-surface-variant text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded">Strategy</span>
                                </div>
                                <button class="opacity-0 group-hover:opacity-100 transition-opacity text-slate-300">
                                    <span class="material-symbols-outlined"
                                        data-icon="drag_indicator">drag_indicator</span>
                                </button>
                            </div>
                            <h4
                                class="font-headline font-bold text-lg mb-2 text-on-surface leading-snug line-through decoration-slate-300">
                                Q3 Marketing Roadmap Finalization
                            </h4>
                            <div class="flex justify-between items-center pt-4 border-t border-surface-container">
                                <div class="flex items-center gap-2">
                                    <img alt="Assignee" class="w-6 h-6 rounded-full object-cover"
                                        data-alt="Modern professional woman with a stylish haircut, minimal jewelry, warm studio lighting, professional corporate headshot"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAFhcrV5YVz0my8iUkYmYkt8dT1V-SMKeGp8oE1PPydsHlgN1WpUIqgQq6YrgsaJ22cdKu0cYyf_V9askpRuAJSNPtCeYhnLBuoKr6FHL1XxzA4AMwQdKMzHunNb2B5Dy9jeRjrADx3hK_sJG4z01xUp67zgCQNnZ0Z62cE3-dIUNFDz0dVrin_FQ5REbwmw3hTZGOyrHk-6JcBYjEpLeF8mba3PfjNi9ScBgUz-ZJZck3BdREIZ-F3gajQFAYK22OVnxFxoMbgts" />
                                    <span class="text-xs font-medium text-slate-400">Sarah M.</span>
                                </div>
                                <span
                                    class="text-[10px] font-bold text-teal-600 uppercase tracking-tighter">Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-member-layout>
