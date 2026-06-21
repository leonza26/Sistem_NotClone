@extends('layouts.member')

@section('title', 'Activity Timeline')

@section('content')
    <div class="max-w-[1600px] px-8 lg:px-10 pb-12 pt-4">
        <!-- Header -->
        <div class="mb-10">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Workspace</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Activity Stream</span>
            </div>
            <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                Activity <span class="text-brand-orange">Timeline.</span>
            </h2>
            <p class="text-brand-slate font-light mt-2 text-sm max-w-2xl">
                A curated flow of updates and milestones across your production environment.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Timeline Canvas -->
            <div
                class="lg:col-span-2 bg-white rounded-[32px] p-8 lg:p-12 border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] relative overflow-hidden">
                <!-- Vertical Line -->
                <div class="absolute left-16 top-0 bottom-0 w-[1px] bg-brand-teal/10"></div>

                <div class="space-y-12 relative z-10">
                    <!-- Timeline Group: Today -->
                    <div>
                        <h3
                            class="ml-20 text-[10px] font-bold text-brand-orange tracking-widest uppercase mb-8 bg-brand-orange/10 w-fit px-3 py-1 rounded-full">
                            Today
                        </h3>

                        <!-- Activity Item 1 -->
                        <div class="relative flex gap-6 items-start group">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-full bg-brand-surface border border-brand-teal/10 text-brand-dark shadow-sm z-10">
                                <span class="material-symbols-outlined text-[20px]">add_task</span>
                            </div>
                            <div class="flex-1 pt-1.5">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-[14px] text-brand-dark font-light">
                                        <span
                                            class="font-medium hover:text-brand-orange cursor-pointer transition-colors">Leon
                                            Role</span>
                                        created
                                        <span class="font-medium">Q4 Project Roadmap</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-semibold text-brand-slate uppercase tracking-wider bg-brand-surface px-2 py-1 rounded-md">10:24
                                        AM</span>
                                </div>
                                <div
                                    class="bg-brand-surface/50 rounded-[20px] p-4 border border-brand-teal/5 transition-all group-hover:bg-brand-surface">
                                    <p class="text-[13px] text-brand-slate font-light leading-relaxed">
                                        Added 12 new milestones and assigned structural leads for the architectural phase.
                                    </p>
                                    <div class="mt-3 flex gap-2">
                                        <span
                                            class="px-2 py-1 bg-white border border-brand-teal/10 text-[9px] font-bold rounded-md text-brand-slate tracking-wide">PLANNING</span>
                                        <span
                                            class="px-2 py-1 bg-white border border-brand-teal/10 text-[9px] font-bold rounded-md text-brand-slate tracking-wide">Q4-2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="relative flex gap-6 items-start mt-10 group">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-full bg-brand-surface border border-brand-teal/10 text-brand-teal shadow-sm z-10">
                                <span class="material-symbols-outlined text-[20px]">edit_note</span>
                            </div>
                            <div class="flex-1 pt-1.5">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-[14px] text-brand-dark font-light">
                                        <span
                                            class="font-medium hover:text-brand-orange cursor-pointer transition-colors">Sarah
                                            Jenkins</span>
                                        updated
                                        <span class="font-medium">Style Guide v2.4</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-semibold text-brand-slate uppercase tracking-wider bg-brand-surface px-2 py-1 rounded-md">09:15
                                        AM</span>
                                </div>
                                <div class="p-3 border-l-[3px] border-brand-teal/30 ml-2">
                                    <p class="text-[13px] italic text-brand-slate font-light">
                                        "Refined the tonal layering tokens to include atmospheric teals for the curation
                                        dashboard."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="relative flex gap-6 items-start mt-10 group">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-full bg-brand-orange/10 border border-brand-orange/20 text-brand-orange shadow-sm z-10">
                                <span class="material-symbols-outlined text-[20px]">image</span>
                            </div>
                            <div class="flex-1 pt-1.5">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-[14px] text-brand-dark font-light">
                                        <span
                                            class="font-medium hover:text-brand-orange cursor-pointer transition-colors">Elena
                                            Rossi</span>
                                        uploaded
                                        <span class="font-medium">4 Curation Assets</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-semibold text-brand-slate uppercase tracking-wider bg-brand-surface px-2 py-1 rounded-md">08:30
                                        AM</span>
                                </div>
                                <div class="grid grid-cols-4 gap-3 mt-3">
                                    <div
                                        class="aspect-square bg-brand-surface rounded-xl overflow-hidden border border-brand-teal/10">
                                        <img class="w-full h-full object-cover hover:scale-105 transition-transform"
                                            src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=400&auto=format&fit=crop" />
                                    </div>
                                    <div
                                        class="aspect-square bg-brand-surface rounded-xl overflow-hidden border border-brand-teal/10">
                                        <img class="w-full h-full object-cover hover:scale-105 transition-transform"
                                            src="https://images.unsplash.com/photo-1555421689-491a97ff2040?q=80&w=400&auto=format&fit=crop" />
                                    </div>
                                    <div
                                        class="aspect-square bg-brand-surface rounded-xl overflow-hidden border border-brand-teal/10">
                                        <img class="w-full h-full object-cover hover:scale-105 transition-transform"
                                            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop" />
                                    </div>
                                    <div
                                        class="aspect-square bg-brand-surface rounded-xl overflow-hidden border border-brand-teal/10 flex items-center justify-center text-[13px] font-medium text-brand-slate hover:bg-white cursor-pointer transition-colors">
                                        +1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Group: Yesterday -->
                    <div class="pt-8">
                        <h3
                            class="ml-20 text-[10px] font-bold text-brand-slate tracking-widest uppercase mb-8 bg-brand-surface w-fit px-3 py-1 rounded-full border border-brand-teal/10">
                            Yesterday
                        </h3>

                        <div class="relative flex gap-6 items-start group">
                            <div
                                class="flex items-center justify-center w-12 h-12 rounded-full bg-brand-dark text-white shadow-sm shadow-brand-dark/20 z-10">
                                <span class="material-symbols-outlined text-[20px]">smart_toy</span>
                            </div>
                            <div class="flex-1 pt-1.5">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-[14px] text-brand-dark font-light">
                                        <span class="font-medium">AI Assistant</span>
                                        optimized
                                        <span class="font-medium">Project Metadata</span>
                                    </p>
                                    <span
                                        class="text-[10px] font-semibold text-brand-slate uppercase tracking-wider bg-brand-surface px-2 py-1 rounded-md">4:50
                                        PM</span>
                                </div>
                                <div class="bg-brand-surface rounded-[20px] p-4 border border-dashed border-brand-teal/20">
                                    <p class="text-[13px] text-brand-slate font-light italic">
                                        Automated tagging completed for 45 files in "Production Workspace".
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar / Stats -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Insights Card -->
                <div
                    class="bg-brand-dark rounded-[32px] p-8 text-white shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-brand-orange/20 blur-2xl rounded-full"></div>
                    <h4 class="text-[10px] font-bold uppercase tracking-widest text-brand-surface/60 mb-8">
                        Weekly Pulse
                    </h4>
                    <div class="space-y-6">
                        <div>
                            <p class="font-outfit text-5xl font-medium">142</p>
                            <p class="text-[11px] font-medium text-brand-surface/60 mt-1 tracking-wide">
                                Total Activities
                            </p>
                        </div>
                        <div class="h-[1px] bg-brand-surface/10 w-full"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-outfit text-2xl font-medium">24</p>
                                <p class="text-[9px] text-brand-surface/60 uppercase tracking-widest mt-1">Tasks</p>
                            </div>
                            <div>
                                <p class="font-outfit text-2xl font-medium">89</p>
                                <p class="text-[9px] text-brand-surface/60 uppercase tracking-widest mt-1">Files</p>
                            </div>
                            <div>
                                <p class="font-outfit text-2xl font-medium text-brand-orange">2.4h</p>
                                <p class="text-[9px] text-brand-orange uppercase tracking-widest mt-1">Response</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <div class="bg-white rounded-[32px] p-6 shadow-sm border border-brand-teal/10">
                    <h4 class="text-[10px] font-bold text-brand-slate uppercase tracking-widest mb-4 px-2">Filters</h4>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 bg-brand-dark text-white rounded-full text-[11px] font-semibold shadow-md">
                            Everything
                        </button>
                        <button
                            class="px-4 py-2 bg-brand-surface border border-brand-teal/10 text-brand-slate rounded-full text-[11px] font-medium hover:bg-white transition-colors">
                            Tasks
                        </button>
                        <button
                            class="px-4 py-2 bg-brand-surface border border-brand-teal/10 text-brand-slate rounded-full text-[11px] font-medium hover:bg-white transition-colors">
                            Assets
                        </button>
                        <button
                            class="px-4 py-2 bg-brand-surface border border-brand-teal/10 text-brand-slate rounded-full text-[11px] font-medium hover:bg-white transition-colors">
                            Mentions
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
