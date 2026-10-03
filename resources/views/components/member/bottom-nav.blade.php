<nav class="fixed bottom-0 left-0 right-0 z-50 md:hidden bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl border-t border-brand-teal/10 dark:border-slate-800 shadow-[0_-4px_25px_-5px_rgba(0,0,0,0.08)] dark:shadow-none"
     style="padding-bottom: env(safe-area-inset-bottom, 0px);">
    <div class="h-16 max-w-lg mx-auto flex items-center justify-around px-1">
        
        <!-- 1. Dashboard -->
        <a href="{{ route('member') }}" 
           class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('member') && !request()->routeIs('member.*') ? 'text-brand-orange font-semibold' : 'text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 font-normal' }}">
            @if(request()->routeIs('member') && !request()->routeIs('member.*'))
                <span class="absolute top-0 w-8 h-1 bg-brand-orange rounded-full"></span>
            @endif
            <span class="material-symbols-outlined text-[22px]" data-icon="space_dashboard">space_dashboard</span>
            <span class="text-[10px] tracking-tight mt-0.5">Home</span>
        </a>

        <!-- 2. Projects -->
        <a href="{{ route('member.projects') }}" 
           class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('member.projects*') ? 'text-brand-orange font-semibold' : 'text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 font-normal' }}">
            @if(request()->routeIs('member.projects*'))
                <span class="absolute top-0 w-8 h-1 bg-brand-orange rounded-full"></span>
            @endif
            <span class="material-symbols-outlined text-[22px]" data-icon="folder">folder</span>
            <span class="text-[10px] tracking-tight mt-0.5">Projects</span>
        </a>

        <!-- 3. Tasks (Kanban) -->
        <a href="{{ route('member.tasks') }}" 
           class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('member.tasks*') ? 'text-brand-orange font-semibold' : 'text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 font-normal' }}">
            @if(request()->routeIs('member.tasks*'))
                <span class="absolute top-0 w-8 h-1 bg-brand-orange rounded-full"></span>
            @endif
            <span class="material-symbols-outlined text-[22px]" data-icon="check_circle">check_circle</span>
            <span class="text-[10px] tracking-tight mt-0.5">Tasks</span>
        </a>

        <!-- 4. Notes & Docs -->
        <a href="{{ route('member.notes') }}" 
           class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('member.notes*') ? 'text-brand-orange font-semibold' : 'text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 font-normal' }}">
            @if(request()->routeIs('member.notes*'))
                <span class="absolute top-0 w-8 h-1 bg-brand-orange rounded-full"></span>
            @endif
            <span class="material-symbols-outlined text-[22px]" data-icon="article">article</span>
            <span class="text-[10px] tracking-tight mt-0.5">Notes</span>
        </a>

        <!-- 5. AI Copilot -->
        <a href="{{ route('member.ai') }}" 
           class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('member.ai*') ? 'text-brand-orange font-semibold' : 'text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 font-normal' }}">
            @if(request()->routeIs('member.ai*'))
                <span class="absolute top-0 w-8 h-1 bg-brand-orange rounded-full"></span>
            @endif
            <span class="material-symbols-outlined text-[22px]" data-icon="smart_toy">smart_toy</span>
            <span class="text-[10px] tracking-tight mt-0.5">AI</span>
        </a>

    </div>
</nav>
