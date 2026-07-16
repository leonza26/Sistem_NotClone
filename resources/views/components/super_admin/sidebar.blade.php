<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-900 border-r border-slate-800 flex flex-col py-6 px-4 z-50">
    <!-- Logo & Badge -->
    <div class="mb-10 px-2 flex flex-col gap-1">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md">
                <!-- Icon Code/Terminal -->
                <span class="material-symbols-outlined text-slate-900 text-[18px]">terminal</span>
            </div>
            <div>
                <h1 class="text-lg font-outfit font-semibold tracking-wide text-white">Flowral.</h1>
            </div>
        </div>
        <div class="ml-11">
            <span
                class="px-2 py-0.5 rounded text-[10px] font-bold tracking-widest bg-red-500/20 text-red-400 uppercase border border-red-500/20">Core
                System</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1.5 overflow-y-auto pr-1 custom-scrollbar">
        <!-- Command Center -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard*') ? 'bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="{{ route('admin') }}">
            <span class="material-symbols-outlined text-[20px]">dashboard</span>
            <span class="text-sm">Command Center</span>
        </a>

        <!-- Identity & Access -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.users*') ? 'bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="{{ route('admin.users.index') }}">
            <span class="material-symbols-outlined text-[20px]">group</span>
            <span class="text-sm">Identity & Access</span>
        </a>

        <!-- Workspace Ecosystem -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.workspaces*') ? 'bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="{{ route('admin.workspaces.index') }}">
            <span class="material-symbols-outlined text-[20px]">domain</span>
            <span class="text-sm">Ecosystems</span>
        </a>

        <div class="pt-4 pb-1">
            <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider px-3">Monitoring</p>
        </div>

        <!-- Shield & Security -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.security*') ? 'bg-red-500/10 border border-red-500/20 text-red-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="{{ route('admin.security.index') }}">
            <span class="material-symbols-outlined text-[20px]">shield_person</span>
            <span class="text-sm">Shield & Security</span>
            <!-- Red dot indicator for active threats (contoh statis) -->
            <span class="ml-auto w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
        </a>

        <!-- Broadcasts -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.broadcasts*') ? 'bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="#">
            <span class="material-symbols-outlined text-[20px]">campaign</span>
            <span class="text-sm">Broadcasts</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="mt-auto pt-6 space-y-1 border-t border-slate-800">
        <!-- Global Configs -->
        <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.settings*') ? 'bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-medium' : 'text-slate-400 font-light hover:bg-slate-800 hover:text-white transition-colors' }}"
            href="#">
            <span class="material-symbols-outlined text-[20px]">admin_panel_settings</span>
            <span class="text-sm">System Configs</span>
        </a>

        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 font-light hover:bg-red-500/10 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                <span class="text-sm">Exit Core</span>
            </button>
        </form>
    </div>
</aside>