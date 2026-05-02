<!-- Page Content -->
<x-member-layout>
    <div class=" max-w-7xl">
        <!-- Breadcrumbs & Title -->
        <div class="mb-12">
            <nav class="flex items-center gap-2 text-on-surface-variant mb-4">
                <span class="text-xs font-medium tracking-wide uppercase">Workspace</span>
                <span class="w-1 h-1 rounded-full bg-primary-container"></span>
                <span class="text-xs font-medium tracking-wide uppercase text-on-surface">Active Projects</span>
            </nav>
            <div class="flex justify-between items-end">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">
                        Project Portfolio
                    </h1>
                    <p class="text-on-surface-variant max-w-md">
                        Curating 12 active architectural initiatives
                        across three global regions.
                    </p>
                </div>
                <button
                    class="signature-gradient text-white px-6 py-3 rounded-lg font-semibold flex items-center gap-2 hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Create Project
                </button>
            </div>
        </div>
        <!-- Bento-Style Projects Grid -->
        <div class="grid grid-cols-12 gap-6">
            <!-- Primary Featured Project (Large) -->
            <div
                class="col-span-12 lg:col-span-8 bg-surface-container-lowest rounded-xl p-8 relative overflow-hidden group cursor-pointer border-none transition-all hover:bg-white">
                <div class="relative z-10 flex flex-col h-full">
                    <div class="flex justify-between items-start mb-12">
                        <div>
                            <span
                                class="bg-primary-container/10 text-primary px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase mb-3 inline-block">In
                                Progress</span>
                            <h3 class="text-3xl font-bold text-on-surface leading-tight">
                                The Obsidian Pavilion<br />Berlin
                                Expansion
                            </h3>
                        </div>
                        <div class="flex -space-x-2">
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="Portrait of a female structural engineer smiling in a modern office with light filtering through glass walls"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJPYmLFItPt5tSlIYTSFhykCzTr2CaZ5PO4OalL6Lkvv1FUQ3UHBbR0HkKZq2DKAQBht49itorVp6Tu-Aa9tUo9oVg2BlzO1CjgUhJrMT1K4uzgmmN73qMmLUML8M4YTqOccKvQoGFkNCW9Ct3Ooqt_ETt0mMjLTBSM7b_sCi3RqTvfpm0HqvoYvEZon5eKmIQ9_aD_AVR5HLnigggTzSdABXlo-D6fjL5kYUzKamsiLd80O_unkUnBd5MGpmIQTgBz3BmOrDgmus" />
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="Headshot of a male design lead with a friendly expression in a minimalist studio environment"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxzGVgSOmLdewhmlHGBkALuyIYJ941zPyPYq-S_UwmF8DpK30Oyxv4tH-sVg_n25Py2eY09yewBPCe-tmxVwn5ypTJYFDyh1zojC1tzL5jtcvoPnpo7gnPX-IN4aAjKUoqbBykkb8xUJ9hf47ZL2oWA70U8DCps_hl48vCPqksJGyLYQtzh-eR8zy0jZB84PvTmMk8zUnDqemsQE8CqdsjNou4wi2NoPkLXnDl-v8T8kllcdKHI2x_Pb5hshJV9-5NdJ6uwh1S28E" />
                            <img class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                data-alt="Portrait of a focused woman architect looking at blueprints in a brightly lit architectural firm"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoLKKlArfHeM1gm1VVZnrafnS-1KWHX1JGPdcpD8LN47G6faa0tfITOfUZO_psXmlZmuDFBrQS2lg0tSxS8JxgzTCyZidsP-HtZvUMkBOD8kVKseFV8UmCFvY6qMp3CdctOUW_btBDAhNU3-xhEIjUd0DQxks8Cr7MLJwYxdAg9G5jz3cOfKUp7fqD08MwZzx413iRRg1Vds4rbULjOperYfdEMpPrWByS5vaFEDFEwfEpPx0DwJhI5_8OtEbdn6jxMrtR1X7VvxE" />
                            <div
                                class="w-10 h-10 rounded-full border-2 border-white bg-surface-container-high flex items-center justify-center text-xs font-bold text-on-surface-variant">
                                +4
                            </div>
                        </div>
                    </div>
                    <div class="mt-auto grid grid-cols-3 gap-8">
                        <div>
                            <p class="text-[0.6875rem] uppercase tracking-widest text-on-surface-variant mb-1">
                                Completion
                            </p>
                            <p class="text-lg font-bold text-on-surface">
                                68%
                            </p>
                            <div class="w-full bg-surface-container h-1 rounded-full mt-2">
                                <div class="bg-primary h-full rounded-full" style="width: 68%"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-[0.6875rem] uppercase tracking-widest text-on-surface-variant mb-1">
                                Deadline
                            </p>
                            <p class="text-lg font-bold text-on-surface">
                                Oct 24
                            </p>
                        </div>
                        <div class="flex justify-end items-end">
                            <span
                                class="material-symbols-outlined text-primary group-hover:translate-x-1 transition-transform"
                                data-icon="arrow_forward">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <!-- Subtle background decoration -->
                <div class="absolute top-0 right-0 w-1/3 h-full opacity-[0.03] pointer-events-none">
                    <img class="h-full w-full object-cover"
                        data-alt="Abstract architectural lines and glass facade reflecting the sky with high contrast and geometric patterns"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuy3dejUbAAah4EvHIZENYhFBXVCzkm5umUZUZxmxg_6Gr9jKqhJOLY5Why_ZOnXCOns0t5tIMvYIIdTt-KapNiSHG-ofoVOKuh0YuyGiwANjc62LPAGHEL65mcwGEhNAlyVedtxuR8xOVLey0VGaDA-0eGSG3jmYvoging3AriGtQHqH7ntp4AVsSE4bXkAzvW99ni5iRusWe5g9hdnkekp699lc3DGDuOxKebBbgGuZX2FyLzKaV13dqeqiRkdYdenfRRekSyWY" />
                </div>
            </div>
            <!-- Secondary Projects -->
            <div
                class="col-span-12 lg:col-span-4 bg-surface-container-lowest rounded-xl p-6 transition-all hover:bg-white cursor-pointer flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-6">
                        <span
                            class="bg-tertiary-container/10 text-tertiary px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase inline-block">Review
                            Required</span>
                        <span class="material-symbols-outlined text-on-surface-variant"
                            data-icon="more_vert">more_vert</span>
                    </div>
                    <h3 class="text-xl font-bold text-on-surface mb-2">
                        Nordic Retreat Concept
                    </h3>
                    <p class="text-sm text-on-surface-variant line-clamp-2">
                        Sustainability focused residential cluster in
                        the Oslo archipelago.
                    </p>
                </div>
                <div class="mt-8 flex justify-between items-center">
                    <div class="flex -space-x-2">
                        <img class="w-8 h-8 rounded-full border-2 border-white object-cover"
                            data-alt="Close up of a professional man in a business casual outfit with soft lighting"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4REL2JY0Ey-P5AwX29TpHoiRYzJ4Zlazob5Hmb4AEeoN2VllLL1vplH_DRDmXKGUALMcMqO9A___VPWSipdaEOy9Dl4pOTI9HwSm3rifn4zlVbFfxlgU2m6k0NvjLmEBqc2nmqK-3Pi8a708kpE8H9qMZ2ysRm-6IDN5ciKVu7Wpm2ZI9VJLlji9tXRBHZi-ex37EDP6SikQi40-IS9P8T0wekE2q_4Co9ulUiWnyzaE6n7oUSAlgjWCD2WC10vA8T8zrJRFM3CU" />
                        <img class="w-8 h-8 rounded-full border-2 border-white object-cover"
                            data-alt="Portrait of a young professional woman with a calm and confident expression"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0bSdL3jBD-ASrJWulSSrFuUFYnydqJfBJ4_VBcI3u6B0qz9W40wlfJvYFpk6Ff6yoCbTRjalDKUBnYkryl5omvB42fr9VkZDLtGysLvrLLjnxkx3QWEqb6afYw9iiXQF96rhUFQclGp-jXLQWEDBpqV6anLY0qF-22Yi-U0J5jRdcize-pkSrl9u7CYooB5Bha1Vdwr9K4bQLWp-sUFN7vzVtY2OmVNbjNU_VUh03judz-FDwQDzcyOrYkJB3AxuHDu4iHJG-MNY" />
                    </div>
                    <span class="text-xs font-bold text-on-surface-variant">4 Active Tasks</span>
                </div>
            </div>
            <!-- Column 3 Row 2 -->
            <div
                class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-lowest rounded-xl p-6 transition-all hover:bg-white cursor-pointer flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <span
                        class="bg-surface-container-high text-on-surface-variant px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase inline-block">Planning</span>
                    <span class="material-symbols-outlined text-on-surface-variant"
                        data-icon="more_vert">more_vert</span>
                </div>
                <h3 class="text-xl font-bold text-on-surface mb-2">
                    Metropolitan Sky-Garden
                </h3>
                <p class="text-sm text-on-surface-variant mb-6">
                    Urban reforestation project for downtown Tokyo
                    high-rise complex.
                </p>
                <div class="mt-auto pt-4 flex justify-between items-center border-t border-surface-container">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-primary"
                            data-icon="calendar_today">calendar_today</span>
                        <span class="text-xs font-medium text-on-surface-variant">Due Dec 12</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-[16px] text-primary" data-icon="person"
                            style="
                                        font-variation-settings: &quot;FILL&quot;
                                            1;
                                    ">person</span>
                    </div>
                </div>
            </div>
            <div
                class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-lowest rounded-xl p-6 transition-all hover:bg-white cursor-pointer flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <span
                        class="bg-primary-container/10 text-primary px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase inline-block">In
                        Progress</span>
                    <span class="material-symbols-outlined text-on-surface-variant"
                        data-icon="more_vert">more_vert</span>
                </div>
                <h3 class="text-xl font-bold text-on-surface mb-2">
                    Lunar Living Modules
                </h3>
                <p class="text-sm text-on-surface-variant mb-6">
                    Collaboration with space agencies for semi-permanent
                    habitat design.
                </p>
                <div class="mt-auto pt-4 flex justify-between items-center border-t border-surface-container">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-primary" data-icon="sync">sync</span>
                        <span class="text-xs font-medium text-on-surface-variant">Updated 2h ago</span>
                    </div>
                    <div class="flex -space-x-2">
                        <img class="w-8 h-8 rounded-full border-2 border-white object-cover"
                            data-alt="Profile of a creative director in a sunny studio with blurred artistic background"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7X2MWlj3AsilsG2fYTyHM6S_5aoVi5_BZkIdyMR74sWzzxE13IcM0QvnRKJp1epRaQCQIpShpbpOKBUY0-gTM5HZzWcSwrvdyFxnfV7WDIYsqwl2LNkJgitbXhdn1tqXE9kuav1hkBVUiQVlTkm0pV0y7qC1k6nwOFMhs-X8C1ALUu_rtlTn-ftlHdlXMqy7lAC2Zg2Ih-YXGIVrwBtvseqGiWDjdrX3MSp6acQ3ZwxJVrkrF_FcC9gBh4GZOUdkq9GTRM8HsP3U" />
                        <img class="w-8 h-8 rounded-full border-2 border-white object-cover"
                            data-alt="Headshot of a smiling senior architect in a minimalist workspace"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiTN-gKe8mMIpWyR3IEVQklfKZUMKxxsDi4ghmoX2OvCait-J6WHBqjIvO_PN5kUGV5KmhiomPI0L2dTAu_BY4PNpwaFS_Zo3vtBOZZeYfef3PIOTWBgndJNxMU223mEEey3T21rfQGrBlX1hzuuoNEUiLvGJH0i3WeKImS9v-5eYAOvAnapioAfSP5APC_fl2HK_KhXsD3Z5x608zwkoZTcsX0PTylDfnUOBRAaz5s-DZyT379Jg1LYelt1a6MFyWmKDcBIO0P7M" />
                    </div>
                </div>
            </div>
            <div
                class="col-span-12 md:col-span-12 lg:col-span-4 bg-primary text-white rounded-xl p-8 cursor-pointer group flex flex-col justify-center items-center text-center">
                <div
                    class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[32px]" data-icon="add_circle">add_circle</span>
                </div>
                <h3 class="text-xl font-bold mb-2">
                    New Portfolio Item
                </h3>
                <p class="text-primary-fixed-dim text-sm">
                    Expand your workspace with a new curated project.
                </p>
            </div>
        </div>
        <!-- Dashboard Stats Ticker (Subtle) -->
        <div class="mt-16 bg-surface-container-low rounded-2xl p-6 flex flex-wrap items-center justify-between gap-8">
            <div class="flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-primary" data-icon="monitoring">monitoring</span>
                </div>
                <div>
                    <p class="text-[0.6875rem] font-bold text-on-surface-variant tracking-wider uppercase">
                        Active Efficiency
                    </p>
                    <p class="text-xl font-bold text-on-surface">
                        94.2%
                    </p>
                </div>
            </div>
            <div class="h-8 w-px bg-outline-variant/30 hidden sm:block"></div>
            <div class="flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-tertiary" data-icon="speed">speed</span>
                </div>
                <div>
                    <p class="text-[0.6875rem] font-bold text-on-surface-variant tracking-wider uppercase">
                        Pipeline Velocity
                    </p>
                    <p class="text-xl font-bold text-on-surface">
                        High
                    </p>
                </div>
            </div>
            <div class="h-8 w-px bg-outline-variant/30 hidden sm:block"></div>
            <div class="flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-lg bg-surface-container-lowest flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-primary-container" data-icon="layers">layers</span>
                </div>
                <div>
                    <p class="text-[0.6875rem] font-bold text-on-surface-variant tracking-wider uppercase">
                        Total Assets
                    </p>
                    <p class="text-xl font-bold text-on-surface">
                        1,204
                    </p>
                </div>
            </div>
            <div class="flex-1 text-right">
                <button class="text-primary font-semibold text-sm hover:underline decoration-2 underline-offset-4">
                    View Full Analytics
                </button>
            </div>
        </div>
    </div>
</x-member-layout>
