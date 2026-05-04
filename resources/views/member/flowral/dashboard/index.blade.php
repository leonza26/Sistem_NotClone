<x-member-layout>
    <div class="px-10 pb-12">
        <header class="max-w-6xl">
            <div
                class="flex items-center gap-2 text-on-surface-variant text-[11px] font-semibold uppercase tracking-wider mb-4">
                <span>Workspace</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span>Dashboard</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span class="text-primary font-bold">Overview</span>
            </div>
        </header>
        <h2
            class="font-headline text-display-md text-5xl font-extrabold text-on-surface leading-tight tracking-tight max-w-3xl">
            Elevating the vision of your
            <span class="text-primary">curated projects.</span>
        </h2>
        <div class="grid grid-cols-12 gap-8 max-w-6xl mt-8">
            <!-- Summary Stats Cards (Asymmetric Span) -->
            <div class="col-span-12 lg:col-span-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Todo Card -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4">
                        <span
                            class="material-symbols-outlined text-slate-200 text-5xl opacity-50 transition-transform group-hover:scale-110"
                            data-icon="pending">pending</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">
                            Todo
                        </p>
                        <h3 class="text-4xl font-headline font-bold text-primary mb-2">
                            12
                        </h3>
                        <div class="flex items-center gap-1 text-[10px] font-bold text-secondary">
                            <span class="material-symbols-outlined text-sm" data-icon="trending_up">trending_up</span>
                            <span>+4 today</span>
                        </div>
                    </div>
                </div>
                <!-- In Progress Card -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4">
                        <span
                            class="material-symbols-outlined text-teal-100 text-5xl opacity-50 transition-transform group-hover:scale-110"
                            data-icon="bolt">bolt</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">
                            In Progress
                        </p>
                        <h3 class="text-4xl font-headline font-bold text-primary mb-2">
                            08
                        </h3>
                        <div class="w-full bg-surface-container h-1 rounded-full mt-4 overflow-hidden">
                            <div class="bg-primary h-full w-[65%]"></div>
                        </div>
                    </div>
                </div>
                <!-- Done Card -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4">
                        <span
                            class="material-symbols-outlined text-orange-100 text-5xl opacity-50 transition-transform group-hover:scale-110"
                            data-icon="check_circle">check_circle</span>
                    </div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-1">
                            Done
                        </p>
                        <h3 class="text-4xl font-headline font-bold text-tertiary mb-2">
                            42
                        </h3>
                        <div class="flex items-center gap-1 text-[10px] font-bold text-tertiary-container">
                            <span>Project Completion: 88%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tasks in Progress (Detailed List) -->
            <div
                class="col-span-12 lg:col-span-8 bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)]">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="font-headline text-xl font-bold tracking-tight">
                        Active Tasks
                    </h4>
                    <button class="text-primary text-xs font-bold uppercase tracking-widest hover:underline">
                        View All
                    </button>
                </div>
                <div class="space-y-4">
                    <!-- Task Item 1 -->
                    <div
                        class="group flex items-center justify-between p-4 rounded-lg hover:bg-surface-container-low transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="architecture">architecture</span>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-on-surface">
                                    Design System Documentation Update
                                </h5>
                                <p class="text-xs text-on-surface-variant">
                                    Core Infrastructure • Due in 2 days
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-8">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                                    data-alt="portrait of a focused software engineer in a modern office"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBh2wfczbkC-0vOPG3pM6wFNLk02iZDmixMFMQOFf6ZLDAJM9JAdjZ-7gFcQxSn__ZQEtfQEn9JHKK3SxSAhJBeTnuXNR4bn-qSZUW5hCcAg3YlzML9fvfUZj1kPRPU5_tGRH39n8GG6WTmKio5OZowNqre57tlILtJ8NMBxaZsv9ofkaed3KNOYJS2NCjPWjS7WG-CdnhvYKKmIeh7ExmoOgls-Bpacwu21i3yg-mFU2z_OBJD0AmXxlKV_9EddVwP90HU8PrhUpk" />
                                <img class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                                    data-alt="creative professional woman with glasses in a bright workspace"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBP1lNfC-5CYsRA5dW2kv4Dr0YArlgPOlvQFWwg533AU5RUZwG3FnVscjkWt8Y0rmqOaX82rtoprJNg3PIWF2ocV2Um1PW3wxIbMqStAOKDn4CHzF3p1MwrrjZBllggXZvIZs55m4YVOOodS28tuPUBzwCoYtvELzy47o45EdTyiYELUpnyWRZ7jLTTEVl-81CdoeqbWILYqsbrkyPcX2sO1D_TCosT_0LGZYFD2UX1hoy1R5JGNjbISa-wRcPsNzmZvFbaf1TzOmQ" />
                            </div>
                            <span
                                class="px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold uppercase tracking-tight">High</span>
                        </div>
                    </div>
                    <!-- Task Item 2 -->
                    <div
                        class="group flex items-center justify-between p-4 rounded-lg hover:bg-surface-container-low transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="edit_note">edit_note</span>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-on-surface">
                                    Content Strategy: Winter Edition
                                </h5>
                                <p class="text-xs text-on-surface-variant">
                                    Marketing • Due tomorrow
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-8">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                                    data-alt="casual businessman in a creative studio environment"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNJF8Gq9CLILzgSONEVcg-zrYtJJcJEqkc_UdSPwctpUEsdWqTjs-tCadGy3EK-NwVvaUHKRaOTX5tkCO6VQGP_aTKmuOPfzrK5zwwOuZ4ntysgJ1FjdoLZy5X0qLB6N32Tuuv_rHF-rXrAt6V7Z9T_NL-aRf9-1_3Q_kMdR3Gw0liRU7nBinDSSjgLw30ZMf2GU3oXishdBhMHrpJpNxh6uo3gZJttKSPieNHTtaGx7R-omOlrrjkWmHTTBIo09CYuO9KVwkB_6E" />
                            </div>
                            <span
                                class="px-3 py-1 rounded-full bg-surface-container text-on-surface-variant text-[10px] font-bold uppercase tracking-tight">Medium</span>
                        </div>
                    </div>
                    <!-- Task Item 3 -->
                    <div
                        class="group flex items-center justify-between p-4 rounded-lg hover:bg-surface-container-low transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="account_tree">account_tree</span>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold text-on-surface">
                                    Backend Integration for API v2
                                </h5>
                                <p class="text-xs text-on-surface-variant">
                                    Engineering • In Review
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-8">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                                    data-alt="professional woman tech lead smiling in a high-tech office"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuB34BBc6s9_eYjrCHBAWOmmaXhrX8HUwjGM5ZJngMvcY3_zHpN3yPtxVf4OA5A9dUtJ_uP05deW74nUsHpIO8RQdE64-ONr1PaQ40TWcvcScoG5Hxkj0uX2qOlyA4TH7nDfEEECXTHyqwW4lZ7Cgs5Cxczw60fb-nBpJ5b7T_5Uzz_EK9c9lRFr9pKcJrM_HwjxhHRlvcI5LoSQRYehHDYryxW2D7dcZn1S5bQIPtmuWzB6x7jkiAcsB1AhPs9JnGpQTqfCu6BjIHA" />
                                <div
                                    class="w-7 h-7 rounded-full bg-surface-dim flex items-center justify-center text-[10px] font-bold text-on-surface-variant">
                                    +2
                                </div>
                            </div>
                            <span
                                class="px-3 py-1 rounded-full bg-primary-container/20 text-primary text-[10px] font-bold uppercase tracking-tight">Urgent</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Activity Feed (Sticky/Asymmetric Sidebar) -->
            <div class="col-span-12 lg:col-span-4 space-y-8">
                <div class="bg-surface-container-low p-8 rounded-xl h-full">
                    <div class="flex items-center gap-2 mb-8">
                        <span class="material-symbols-outlined text-primary" data-icon="history">history</span>
                        <h4 class="font-headline text-lg font-bold tracking-tight">
                            Team Activity
                        </h4>
                    </div>
                    <div
                        class="space-y-8 relative before:absolute before:left-[11px] before:top-2 before:bottom-0 before:w-[1px] before:bg-outline-variant/50">
                        <!-- Activity Item 1 -->
                        <div class="relative pl-8">
                            <div
                                class="absolute left-0 top-1 w-6 h-6 rounded-full bg-primary ring-4 ring-surface-container-low flex items-center justify-center">
                                <span class="material-symbols-outlined text-white text-[14px]" data-icon="check"
                                    data-weight="fill" style="font-variation-settings: &quot;FILL&quot; 1">check</span>
                            </div>
                            <p class="text-xs leading-relaxed">
                                <span class="font-bold text-on-surface">Marcus Thorne</span>
                                marked
                                <span class="text-primary font-medium">Hero Section Redesign</span>
                                as complete.
                            </p>
                            <span class="text-[10px] text-on-surface-variant font-medium block mt-1">12 minutes
                                ago</span>
                        </div>
                        <!-- Activity Item 2 -->
                        <div class="relative pl-8">
                            <div
                                class="absolute left-0 top-1 w-6 h-6 rounded-full bg-secondary-container ring-4 ring-surface-container-low flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-[14px]"
                                    data-icon="chat_bubble" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1">chat_bubble</span>
                            </div>
                            <p class="text-xs leading-relaxed">
                                <span class="font-bold text-on-surface">Sarah Chen</span>
                                commented on
                                <span class="text-primary font-medium">User Research Synthesis</span>.
                            </p>
                            <div
                                class="mt-2 p-3 bg-surface-container-lowest rounded-lg border-l-2 border-primary italic text-[11px] text-on-surface-variant">
                                "The insights on the mobile navigation are exactly what we
                                needed."
                            </div>
                            <span class="text-[10px] text-on-surface-variant font-medium block mt-1">2 hours
                                ago</span>
                        </div>
                        <!-- Activity Item 3 -->
                        <div class="relative pl-8">
                            <div
                                class="absolute left-0 top-1 w-6 h-6 rounded-full bg-tertiary-fixed ring-4 ring-surface-container-low flex items-center justify-center">
                                <span class="material-symbols-outlined text-tertiary text-[14px]"
                                    data-icon="person_add" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1">person_add</span>
                            </div>
                            <p class="text-xs leading-relaxed">
                                <span class="font-bold text-on-surface">Admin</span> invited
                                <span class="text-primary font-medium">Julian V.</span> to the
                                workspace.
                            </p>
                            <span class="text-[10px] text-on-surface-variant font-medium block mt-1">5 hours
                                ago</span>
                        </div>
                        <!-- Activity Item 4 -->
                        <div class="relative pl-8">
                            <div
                                class="absolute left-0 top-1 w-6 h-6 rounded-full bg-surface-container-highest ring-4 ring-surface-container-low flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-surface-variant text-[14px]"
                                    data-icon="upload_file" data-weight="fill"
                                    style="font-variation-settings: &quot;FILL&quot; 1">upload_file</span>
                            </div>
                            <p class="text-xs leading-relaxed">
                                <span class="font-bold text-on-surface">Elena Rossi</span>
                                uploaded 3 new attachments to
                                <span class="text-primary font-medium">Brand Guidelines</span>.
                            </p>
                            <span class="text-[10px] text-on-surface-variant font-medium block mt-1">Yesterday</span>
                        </div>
                    </div>
                    <button
                        class="w-full mt-12 py-3 rounded-md bg-surface-container-highest text-on-surface text-xs font-bold uppercase tracking-widest hover:bg-surface-variant transition-colors">
                        View History
                    </button>
                </div>
                <!-- CTA Card (Signature Component) -->
                <div class="signature-gradient p-8 rounded-xl text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h5 class="font-headline text-lg font-bold mb-2">
                            Need a curator?
                        </h5>
                        <p class="text-sm opacity-90 mb-6 leading-relaxed">
                            Our AI assistant can help you organize and prioritize your tasks
                            based on current team velocity.
                        </p>
                        <button
                            class="px-6 py-2 bg-white text-primary rounded-md text-xs font-bold uppercase tracking-widest shadow-lg hover:scale-105 transition-transform">
                            Launch Assistant
                        </button>
                    </div>
                    <span class="material-symbols-outlined absolute -bottom-6 -right-6 text-9xl opacity-10"
                        data-icon="smart_toy">smart_toy</span>
                </div>
            </div>
        </div>
    </div>

</x-member-layout>
