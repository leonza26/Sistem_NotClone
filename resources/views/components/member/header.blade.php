<header
    class="fixed top-0 right-0 left-64 h-16 bg-brand-surface/60 backdrop-blur-xl z-40 flex justify-between items-center px-8 border-b border-brand-teal/10 transition-all">
    <!-- Search Bar -->
    <form action="{{ route('member.search') }}" method="GET" class="flex items-center gap-6">
        <div class="relative group">
            <span
                class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-brand-slate/50 group-focus-within:text-brand-dark transition-colors text-[18px]"
                data-icon="search">search</span>

            <!-- Tambahkan attribute name="q" dan value -->
            <input name="q" value="{{ request('q') }}"
                class="pl-10 pr-4 py-2 bg-white/50 border border-brand-teal/10 rounded-full text-sm w-72 focus:ring-2 focus:ring-brand-teal/20 focus:bg-white transition-all outline-none placeholder:text-brand-slate/50 font-light"
                placeholder="Search across workspaces..." type="text" autocomplete="off" />
        </div>
    </form>

    <!-- Right Actions -->
    <div class="flex items-center gap-3">
        <!-- Notif Dropdown -->
        <div class="relative group" x-data="{ openNotif: false }">
            <!-- Tombol Lonceng -->
            <button @click="openNotif = !openNotif" @click.away="openNotif = false"
                class="w-9 h-9 flex items-center justify-center text-brand-slate hover:text-brand-dark hover:bg-white rounded-full transition-colors relative border border-transparent hover:border-brand-teal/10">
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
                class="absolute right-0 mt-3 w-80 bg-white border border-brand-teal/10 rounded-2xl shadow-[0_10px_40px_-10px_rgba(48,71,78,0.15)] z-50 overflow-hidden">

                <div
                    class="px-4 py-3 border-b border-brand-teal/10 flex justify-between items-center bg-brand-surface/30">
                    <h3 class="text-sm font-medium text-brand-dark font-outfit">Notifications</h3>
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
                            <p class="text-xs text-brand-dark font-medium leading-relaxed">
                                {{ $notification->data['message'] }}
                            </p>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-[10px] text-brand-slate">{{ $notification->created_at->diffForHumans() }}
                                </p>
                                <a href="{{ $notification->data['action_url'] }}"
                                    class="text-[10px] text-brand-teal hover:text-brand-dark font-medium">View Task</a>
                            </div>
                        </div>
                    @empty
                        <!-- Jika kosong -->
                        <div class="px-4 py-8 text-center">
                            <span
                                class="material-symbols-outlined text-brand-slate/30 text-4xl mb-2">notifications_off</span>
                            <p class="text-xs text-brand-slate font-light">Belum ada notifikasi baru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

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
                <a href="/"
                    class="block px-4 py-3 text-sm font-light text-brand-slate hover:bg-brand-surface hover:text-brand-dark transition-colors">
                    <span class="material-symbols-outlined text-[16px] align-middle mr-2" data-icon="home">
                        home
                    </span>
                    Home
                </a>
                <a href="{{ route('member.settings.index') }}"
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