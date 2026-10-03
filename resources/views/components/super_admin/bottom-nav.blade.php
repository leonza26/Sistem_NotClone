<div x-data="{ openSystemSheet: false }">
    <!-- Bottom Navigation Bar (Super Admin) -->
    <nav class="fixed bottom-0 left-0 right-0 z-50 md:hidden bg-slate-900/95 backdrop-blur-xl border-t border-slate-800 shadow-[0_-4px_25px_-5px_rgba(0,0,0,0.5)]"
         style="padding-bottom: env(safe-area-inset-bottom, 0px);">
        <div class="h-16 max-w-lg mx-auto flex items-center justify-around px-1">
            
            <!-- 1. Dashboard -->
            <a href="{{ route('admin') }}" 
               class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('admin') && !request()->routeIs('admin.*') ? 'text-indigo-400 font-semibold' : 'text-slate-400 hover:text-white font-normal' }}">
                @if(request()->routeIs('admin') && !request()->routeIs('admin.*'))
                    <span class="absolute top-0 w-8 h-1 bg-indigo-500 rounded-full"></span>
                @endif
                <span class="material-symbols-outlined text-[22px]">dashboard</span>
                <span class="text-[10px] tracking-tight mt-0.5">Command</span>
            </a>

            <!-- 2. Users -->
            <a href="{{ route('admin.users.index') }}" 
               class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('admin.users*') ? 'text-indigo-400 font-semibold' : 'text-slate-400 hover:text-white font-normal' }}">
                @if(request()->routeIs('admin.users*'))
                    <span class="absolute top-0 w-8 h-1 bg-indigo-500 rounded-full"></span>
                @endif
                <span class="material-symbols-outlined text-[22px]">group</span>
                <span class="text-[10px] tracking-tight mt-0.5">Users</span>
            </a>

            <!-- 3. Workspaces -->
            <a href="{{ route('admin.workspaces.index') }}" 
               class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('admin.workspaces*') ? 'text-indigo-400 font-semibold' : 'text-slate-400 hover:text-white font-normal' }}">
                @if(request()->routeIs('admin.workspaces*'))
                    <span class="absolute top-0 w-8 h-1 bg-indigo-500 rounded-full"></span>
                @endif
                <span class="material-symbols-outlined text-[22px]">domain</span>
                <span class="text-[10px] tracking-tight mt-0.5">Workspaces</span>
            </a>

            <!-- 4. Security -->
            <a href="{{ route('admin.security.index') }}" 
               class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('admin.security*') ? 'text-red-400 font-semibold' : 'text-slate-400 hover:text-white font-normal' }}">
                @if(request()->routeIs('admin.security*'))
                    <span class="absolute top-0 w-8 h-1 bg-red-500 rounded-full"></span>
                @endif
                <span class="material-symbols-outlined text-[22px]">shield_person</span>
                <span class="text-[10px] tracking-tight mt-0.5">Security</span>
            </a>

            <!-- 5. System (Bottom Sheet Trigger) -->
            <button @click="openSystemSheet = true" type="button"
                    class="flex-1 flex flex-col items-center justify-center py-1 transition-all relative group {{ request()->routeIs('admin.configs*') || request()->routeIs('admin.broadcasts*') ? 'text-indigo-400 font-semibold' : 'text-slate-400 hover:text-white font-normal' }}">
                @if(request()->routeIs('admin.configs*') || request()->routeIs('admin.broadcasts*'))
                    <span class="absolute top-0 w-8 h-1 bg-indigo-500 rounded-full"></span>
                @endif
                <span class="material-symbols-outlined text-[22px]">tune</span>
                <span class="text-[10px] tracking-tight mt-0.5">System</span>
            </button>

        </div>
    </nav>

    <!-- Bottom Sheet Modal for System Options -->
    <div x-show="openSystemSheet" x-cloak style="display: none;" class="fixed inset-0 z-[100] md:hidden">
        <!-- Backdrop -->
        <div x-show="openSystemSheet"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="openSystemSheet = false"
             class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm"></div>

        <!-- Sheet Panel -->
        <div x-show="openSystemSheet"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-y-full"
             x-transition:enter-end="translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-y-0"
             x-transition:leave-end="translate-y-full"
             class="absolute bottom-0 left-0 right-0 bg-slate-900 border-t border-slate-800 rounded-t-3xl p-6 shadow-2xl z-10"
             style="padding-bottom: calc(1.5rem + env(safe-area-inset-bottom, 0px));">
            
            <!-- Drag Handle Bar -->
            <div class="w-12 h-1.5 bg-slate-700 rounded-full mx-auto mb-6"></div>

            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="font-outfit font-semibold text-lg text-white">System Controls</h3>
                    <p class="text-xs text-slate-400">Core administrative configurations</p>
                </div>
                <button @click="openSystemSheet = false" class="p-2 text-slate-400 hover:text-white rounded-full hover:bg-slate-800">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <div class="space-y-2">
                <!-- Global Configs -->
                <a href="{{ route('admin.configs.index') }}" 
                   class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 transition-colors {{ request()->routeIs('admin.configs*') ? 'border-indigo-500/50 bg-indigo-500/10' : '' }}">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[22px]">admin_panel_settings</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Global Configurations</p>
                        <p class="text-xs text-slate-400">Maintenance mode, limits, feature flags</p>
                    </div>
                </a>

                <!-- Broadcasts -->
                <a href="{{ route('admin.broadcasts.index') }}" 
                   class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/50 transition-colors {{ request()->routeIs('admin.broadcasts*') ? 'border-indigo-500/50 bg-indigo-500/10' : '' }}">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[22px]">campaign</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Broadcasts & Changelog</p>
                        <p class="text-xs text-slate-400">System announcements & release notes</p>
                    </div>
                </a>

                <!-- Switch to Member -->
                <a href="{{ route('member') }}" 
                   class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-slate-800/40 hover:bg-slate-800 border border-slate-700/30 transition-colors">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[22px]">launch</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Switch to Member Area</p>
                        <p class="text-xs text-slate-400">Open personal workspace view</p>
                    </div>
                </a>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST" class="w-full pt-2">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center justify-center gap-2 p-3.5 rounded-2xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-medium text-sm border border-red-500/20 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Sign out of Core System
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
