<aside
    class="h-screen w-64 fixed left-0 top-0 bg-brand-surface dark:bg-slate-900 border-r border-brand-teal/10 dark:border-brand-teal/20 flex flex-col py-6 px-4 z-50">
    <!-- Logo -->
    <div class="mb-12 px-2 flex items-center gap-3">
        <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-8 h-8 object-contain">
        <div>
            <h1 class="text-lg font-outfit font-medium tracking-wide text-brand-dark dark:text-white">Flowral.</h1>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1.5 overflow-y-auto pr-1 custom-scrollbar">
        <!-- Dashboard -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member') }}">
            <span class="material-symbols-outlined text-[20px]">space_dashboard</span>
            <span class="text-sm">Dashboard</span>
        </a>
        <!-- Workspaces -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.workspace*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.workspace.index') }}">
            <span class="material-symbols-outlined text-[20px]">workspaces</span>
            <span class="text-sm">Workspaces</span>
        </a>
        <!-- Projects -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.projects*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.projects') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">folder</span>
            <span class="text-sm">Projects</span>
        </a>
        <!-- Tasks -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.tasks*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.tasks') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">check_circle</span>
            <span class="text-sm">Tasks</span>
        </a>
        <!-- Notes & Docs -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.notes*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.notes') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">article</span>
            <span class="text-sm">Notes & Docs</span>
        </a>
        <!-- Activity -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.activity*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.activity') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">pulse_alert</span>
            <span class="text-sm">Activity</span>
        </a>
        <!-- AI Assistant -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('member.ai*') ? 'bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/70 text-brand-dark dark:text-white shadow-sm font-medium' : 'text-brand-slate dark:text-slate-400 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 hover:text-brand-dark dark:hover:text-white transition-colors' }}"
            href="{{ route('member.ai') ?? '#' }}">
            <span class="material-symbols-outlined text-[20px]">smart_toy</span>
            <span class="text-sm">AI Assistant</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="mt-auto pt-6 space-y-1 border-t border-brand-teal/10 dark:border-brand-teal/20">
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-brand-slate dark:text-slate-300 font-light hover:bg-white/50 dark:hover:bg-slate-800/50 transition-colors"
            href="{{ route('member.settings.index') }}">
            <span class="material-symbols-outlined text-[20px]">settings</span>
            <span class="text-sm">Settings</span>
        </a>
    </div>
</aside>
