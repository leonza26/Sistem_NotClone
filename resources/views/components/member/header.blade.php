<header
    class="fixed top-0 right-0 left-0 md:left-64 h-16 bg-brand-surface/80 dark:bg-slate-900/90 backdrop-blur-xl z-40 flex justify-between items-center px-4 md:px-8 border-b border-brand-teal/10 dark:border-brand-teal/20 transition-all">
    <!-- Left: Mobile Brand & Search Bar -->
    <div class="flex items-center gap-3">
        <!-- Mini Logo (Mobile Only) -->
        <a href="{{ route('member') }}" class="flex items-center gap-2 md:hidden shrink-0">
            <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-7 h-7 object-contain">
            <span class="font-outfit font-semibold text-base text-brand-dark dark:text-white">Flowral</span>
        </a>

        <!-- Search Bar -->
        <form action="{{ route('member.search') }}" method="GET" class="flex items-center">
            <div class="relative group">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-brand-slate/50 group-focus-within:text-brand-dark dark:group-focus-within:text-white transition-colors text-[18px]"
                    data-icon="search">search</span>

                <input name="q" value="{{ request('q') }}"
                    class="pl-9 pr-3 py-1.5 md:py-2 bg-white/60 dark:bg-slate-800/60 border border-brand-teal/10 dark:border-brand-teal/20 rounded-full text-xs md:text-sm w-28 sm:w-48 md:w-72 focus:w-40 sm:focus:w-56 md:focus:w-72 focus:ring-2 focus:ring-brand-teal/20 focus:bg-white dark:focus:bg-slate-800 transition-all outline-none placeholder:text-brand-slate/50 dark:placeholder:text-slate-400 font-light text-brand-dark dark:text-white"
                    placeholder="Search..." type="text" autocomplete="off" />
            </div>
        </form>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-3">
        <!-- Dark Mode Toggle Button (Alpine.js) -->
        <button x-data="{ isDark: document.documentElement.classList.contains('dark') }" @click="
            isDark = !isDark; 
            if(isDark) { 
                document.documentElement.classList.add('dark'); 
                localStorage.theme = 'dark'; 
            } else { 
                document.documentElement.classList.remove('dark'); 
                localStorage.theme = 'light'; 
            }
        " class="relative p-2 text-slate-400 hover:text-slate-600 dark:hover:bg-slate-800 transition-colors rounded-full hover:bg-slate-100 focus:outline-none"
            aria-label="Toggle Dark Mode">
            <span x-show="isDark" x-cloak class="material-symbols-outlined text-[20px]">light_mode</span>
            <span x-show="!isDark" class="material-symbols-outlined text-[20px]">dark_mode</span>
        </button>

        <!-- Notif Dropdown -->
        <div class="relative group" x-data="{ openNotif: false }">
            <!-- Tombol Lonceng -->
            <button @click="openNotif = !openNotif" @click.away="openNotif = false"
                class="w-9 h-9 flex items-center justify-center text-brand-slate dark:text-slate-300 hover:text-brand-dark dark:hover:text-white hover:bg-white dark:hover:bg-slate-800 rounded-full transition-colors relative border border-transparent hover:border-brand-teal/10">
                <span class="material-symbols-outlined text-[20px]" data-icon="notifications">notifications</span>

                <!-- Titik oranye muncul jika ada notif yang belum dibaca -->
                @if (Auth::user()->unreadNotifications->count() > 0)
                    <span class="absolute top-2 right-2 w-2 h-2 bg-brand-orange rounded-full border border-white"></span>
                @endif
            </button>

            <!-- Box Dropdown Notifikasi -->
            <div x-show="openNotif" x-cloak style="display: none;" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="absolute right-0 mt-3 w-80 bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 rounded-2xl shadow-[0_10px_40px_-10px_rgba(48,71,78,0.15)] z-50 overflow-hidden">

                <div
                    class="px-4 py-3 border-b border-brand-teal/10 dark:border-brand-teal/20 flex justify-between items-center bg-brand-surface/30">
                    <h3 class="text-sm font-medium text-brand-dark dark:text-white font-outfit">Notifications</h3>
                    <span
                        class="text-[10px] font-semibold bg-brand-orange/10 text-brand-orange px-2 py-0.5 rounded-full">
                        {{ Auth::user()->unreadNotifications->count() }} New
                    </span>
                </div>

                <!-- List Notifikasi -->
                <div class="max-h-80 overflow-y-auto">
                    @forelse(Auth::user()->unreadNotifications as $notification)
                        <div
                            class="px-4 py-3 border-b border-brand-teal/5 hover:bg-brand-surface/50 transition-colors cursor-pointer">
                            <p class="text-xs text-brand-dark dark:text-white font-medium leading-relaxed">
                                {{ $notification->data['message'] }}
                            </p>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-[10px] text-brand-slate dark:text-slate-300">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                                <a href="{{ $notification->data['action_url'] }}"
                                    class="text-[10px] text-brand-teal hover:text-brand-dark dark:hover:text-white font-medium">View
                                    Task</a>
                            </div>
                        </div>
                    @empty
                        <!-- Jika kosong -->
                        <div class="px-4 py-8 text-center">
                            <span
                                class="material-symbols-outlined text-brand-slate/30 text-4xl mb-2">notifications_off</span>
                            <p class="text-xs text-brand-slate dark:text-slate-300 font-light">Belum ada notifikasi baru.
                            </p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

        <div class="h-6 w-[1px] bg-brand-teal/20 mx-2"></div>

        <!-- Profile Dropdown (Touch-Friendly dengan Alpine.js) -->
        <div class="relative" x-data="{ openProfile: false }">
            <div @click="openProfile = !openProfile" @click.away="openProfile = false" class="flex items-center gap-2 sm:gap-3 pl-1 sm:pl-2 cursor-pointer select-none">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-medium text-brand-dark dark:text-white">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-brand-slate dark:text-slate-300 font-light">Member</p>
                </div>
                <img alt="User Avatar"
                    class="w-8 h-8 rounded-full object-cover border border-brand-teal/20 dark:border-brand-teal/30 hover:border-brand-teal/50 transition-all"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=F5FAFB&color=282B2A&bold=true" />
            </div>

            <!-- Dropdown Box -->
            <div x-show="openProfile" x-cloak style="display: none;"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                class="absolute right-0 mt-3 w-52 bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 rounded-2xl shadow-[0_10px_40px_-10px_rgba(48,71,78,0.2)] z-50 overflow-hidden">
                
                <div class="px-4 py-3 border-b border-brand-teal/10 dark:border-brand-teal/20 sm:hidden">
                    <p class="text-xs font-semibold text-brand-dark dark:text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-brand-slate dark:text-slate-400 truncate">{{ Auth::user()->email }}</p>
                </div>

                <a href="/"
                    class="flex items-center px-4 py-2.5 text-sm font-light text-brand-slate dark:text-slate-300 hover:bg-brand-surface dark:hover:bg-slate-700 hover:text-brand-dark dark:hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-[18px] mr-2.5 text-brand-teal" data-icon="home">home</span>
                    Home
                </a>
                <a href="{{ route('member.settings.index') }}"
                    class="flex items-center px-4 py-2.5 text-sm font-light text-brand-slate dark:text-slate-300 hover:bg-brand-surface dark:hover:bg-slate-700 hover:text-brand-dark dark:hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-[18px] mr-2.5 text-brand-teal" data-icon="person">person</span>
                    Profile & Settings
                </a>
                <div class="h-[1px] bg-brand-teal/10 dark:bg-slate-700 w-full"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left flex items-center px-4 py-2.5 text-sm font-medium text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 hover:text-red-600 transition-colors">
                        <span class="material-symbols-outlined text-[18px] mr-2.5" data-icon="logout">logout</span>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>