<aside
    class="h-screen w-64 fixed left-0 top-0 bg-brand-surface border-r border-brand-teal/10 flex flex-col py-6 px-4 z-50">
    <!-- Logo -->
    <div class="mb-12 px-2 flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center shadow-md">
            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
        <div>
            <h1 class="text-lg font-outfit font-medium tracking-wide text-brand-dark">Flowral.</h1>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1.5 overflow-y-auto pr-1 custom-scrollbar">
        <!-- Dashboard -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member') }}">
            <span class="material-symbols-outlined text-[20px]">space_dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <!-- Workspaces -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.workspace*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.workspace.index') }}">
            <span class="material-symbols-outlined text-[20px]">workspaces</span>
            <span class="text-sm">Workspaces</span>
        </a>
        <!-- Projects -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.projects*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.projects') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">folder</span>
            <span class="text-sm">Projects</span>
        </a>
        <!-- Tasks -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.tasks*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.tasks') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">check_circle</span>
            <span class="text-sm">Tasks</span>
        </a>
        <!-- Notes & Docs -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.notes*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.notes') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">article</span>
            <span class="text-sm">Notes & Docs</span>
        </a>
        <!-- Activity -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.activity*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.activity') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">pulse_alert</span>
            <span class="text-sm">Activity</span>
        </a>
        <!-- AI Assistant -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.ai*') ? 'bg-white border border-brand-teal/20 text-brand-dark shadow-[0_2px_10px_-4px_rgba(48,71,78,0.1)] font-medium' : 'text-brand-slate font-light hover:bg-white/50 hover:text-brand-dark transition-colors' }}"
            href="{{ route('member.ai') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">smart_toy</span>
            <span class="text-sm">AI Assistant</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="mt-auto pt-6 space-y-1 border-t border-brand-teal/10">
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-brand-slate font-light hover:bg-white/50 transition-colors"
            href="{{ route('member.settings') }}">
            <span class="material-symbols-outlined text-[20px]">settings</span>
            <span class="text-sm">Settings</span>
        </a>
    </div>
</aside>
