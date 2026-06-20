<header
    class="fixed top-0 right-0 left-64 h-16 bg-white/70 backdrop-blur-xl z-40 flex justify-between items-center px-8 transition-all duration-300">
    <div class="flex items-center gap-6">
        <div class="relative group">
            <span
                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary transition-colors"
                data-icon="search">search</span>
            <input
                class="pl-10 pr-4 py-1.5 bg-surface-container-low border-none rounded-full text-sm w-64 focus:ring-2 focus:ring-primary/20 focus:bg-white transition-all"
                placeholder="Search workspace..." type="text" />
        </div>
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
            <a class="text-slate-600 hover:text-teal-600 transition-colors" href="#">Workspaces</a>
            <a class="text-slate-600 hover:text-teal-600 transition-colors" href="#">Recent</a>
            <a class="text-slate-600 hover:text-teal-600 transition-colors" href="#">Templates</a>
        </nav>
    </div>
    <div class="flex items-center gap-4">
        <button
            class="w-10 h-10 flex items-center justify-center text-slate-600 hover:bg-surface-container-high rounded-full transition-colors relative">
            <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-tertiary rounded-full border-2 border-white"></span>
        </button>
        <button
            class="w-10 h-10 flex items-center justify-center text-slate-600 hover:bg-surface-container-high rounded-full transition-colors">
            <span class="material-symbols-outlined" data-icon="history">history</span>
        </button>
        <div class="h-8 w-[1px] bg-outline-variant/30 mx-2"></div>

        <!-- Profile Dropdown -->
        <div class="relative group">
            <!-- Area yang di-hover -->
            <div class="flex items-center gap-3 pl-2 cursor-pointer">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-on-surface">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-on-surface-variant font-medium">Member</p>
                </div>
                <img alt="User Avatar"
                    class="w-9 h-9 rounded-full object-cover ring-2 ring-transparent group-hover:ring-primary/20 transition-all"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&bold=true" />
            </div>

            <!-- Isi Dropdown (Muncul saat diarea profile di-hover) -->
            <div
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-[0_10px_25px_-5px_rgba(0,0,0,0.1)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden translate-y-2 group-hover:translate-y-0">

                <a href="#"
                    class="block px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-teal-600 transition-colors">
                    <span class="material-symbols-outlined text-sm align-middle mr-2" data-icon="person">person</span>
                    Profile
                </a>

                <div class="h-[1px] bg-gray-100 w-full"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors">
                        <span class="material-symbols-outlined text-sm align-middle mr-2"
                            data-icon="logout">logout</span>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
