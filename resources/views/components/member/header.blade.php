<header
    class="fixed top-0 right-0 left-64 h-16 bg-brand-surface/60 backdrop-blur-xl z-40 flex justify-between items-center px-8 border-b border-brand-teal/10 transition-all">
    <!-- Search Bar -->
    <div class="flex items-center gap-6">
        <div class="relative group">
            <span
                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-brand-slate/50 group-focus-within:text-brand-dark transition-colors text-[18px]"
                data-icon="search">search</span>
            <input
                class="pl-10 pr-4 py-2 bg-white/50 border border-brand-teal/10 rounded-full text-sm w-72 focus:ring-2 focus:ring-brand-teal/20 focus:bg-white transition-all outline-none placeholder:text-brand-slate/50 font-light"
                placeholder="Search across workspaces..." type="text" />
        </div>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-3">
        <!-- Notif Button -->
        <button
            class="w-9 h-9 flex items-center justify-center text-brand-slate hover:text-brand-dark hover:bg-white rounded-full transition-colors relative border border-transparent hover:border-brand-teal/10">
            <span class="material-symbols-outlined text-[20px]" data-icon="notifications">notifications</span>
            <span class="absolute top-2 right-2 w-1.5 h-1.5 bg-brand-orange rounded-full"></span>
        </button>

        <div class="h-6 w-[1px] bg-brand-teal/20 mx-2"></div>

        <!-- Profile Dropdown (Logika Asli) -->
        <div class="relative group">
            <div class="flex items-center gap-3 pl-2 cursor-pointer">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-medium text-brand-dark">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-brand-slate font-light">Member</p>
                </div>
                <img alt="User Avatar"
                    class="w-8 h-8 rounded-full object-cover border border-brand-teal/20 group-hover:border-brand-teal/50 transition-all"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=F5FAFB&color=282B2A&bold=true" />
            </div>

            <!-- Dropdown Box -->
            <div
                class="absolute right-0 mt-3 w-48 bg-white border border-brand-teal/10 rounded-2xl shadow-[0_10px_40px_-10px_rgba(48,71,78,0.15)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 overflow-hidden translate-y-2 group-hover:translate-y-0">
                <a href="#"
                    class="block px-4 py-3 text-sm font-light text-brand-slate hover:bg-brand-surface hover:text-brand-dark transition-colors">
                    <span class="material-symbols-outlined text-[16px] align-middle mr-2"
                        data-icon="person">person</span>
                    Profile
                </a>
                <div class="h-[1px] bg-brand-teal/10 w-full"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block px-4 py-3 text-sm font-medium text-red-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                        <span class="material-symbols-outlined text-[16px] align-middle mr-2"
                            data-icon="logout">logout</span>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
