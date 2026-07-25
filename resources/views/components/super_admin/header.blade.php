<header
    class="h-20 fixed top-0 right-0 left-64 bg-brand-surface/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-10 z-40">

    <!-- Left: Page Title / Breadcrumbs -->
    <div class="flex items-center gap-4">
        <h2 class="text-xl font-outfit font-medium text-slate-800">
            @yield('header_title', 'Command Center')
        </h2>
        <div class="h-5 w-px bg-slate-300"></div>
        <span class="text-sm text-slate-500 font-light flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px] text-green-500">check_circle</span>
            System Operational
        </span>
    </div>

    <!-- Right: Admin Profile & Actions -->
    <div class="flex items-center gap-6">

        <!-- Notification Dropdown (Alpine.js) -->
        <div x-data="{ notifOpen: false }" class="relative">
            @php
                // Minta sistem menarik semua notifikasi yang berstatus "Belum Dibaca"
                $unreadNotifications = auth()->user() ? auth()->user()->unreadNotifications : collect();
            @endphp

            <button @click="notifOpen = !notifOpen" @click.away="notifOpen = false"
                class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-full hover:bg-slate-100 focus:outline-none">
                <span class="material-symbols-outlined">notifications_active</span>
            
                @if($unreadNotifications->count() > 0)
                    <!-- Dot indicator merah yang berdenyut (Pulse) -->
                    <span
                        class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-brand-surface animate-pulse"></span>
                @endif
            </button>

            <!-- Menu Dropdown Notifikasi -->
            <div x-show="notifOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="absolute right-0 mt-3 w-80 bg-white border border-slate-200 rounded-2xl shadow-xl py-2 z-50 overflow-hidden"
                style="display: none;">

                <!-- Judul Dropdown -->
                <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-slate-800">Notifications</h3>
                    @if($unreadNotifications->count() > 0)
                        <span
                            class="text-[10px] font-bold bg-red-50 text-red-500 px-2 py-0.5 rounded-full">{{ $unreadNotifications->count() }}
                            New</span>
                    @endif
                </div>

                <!-- Daftar Notifikasi (Bisa di-scroll jika kepanjangan) -->
                <div class="max-h-[300px] overflow-y-auto">
                    @forelse($unreadNotifications as $notif)
                        <a href="{{ $notif->data['url'] ?? '#' }}"
                            class="block px-4 py-3 hover:bg-slate-50 border-b border-slate-50 last:border-0 transition-colors">
                            <div class="flex items-start gap-3">
                                <!-- Ikon dinamis dari database -->
                                <div
                                    class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 bg-{{ $notif->data['color'] ?? 'blue' }}-50 text-{{ $notif->data['color'] ?? 'blue' }}-500">
                                    <span
                                        class="material-symbols-outlined text-[16px]">{{ $notif->data['icon'] ?? 'notifications' }}</span>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-slate-800">
                                        {{ $notif->data['title'] ?? 'System Alert' }}</p>
                                    <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">
                                        {{ $notif->data['message'] ?? 'No details provided.' }}</p>
                                    <p class="text-[9px] font-bold text-slate-300 uppercase mt-1">
                                        {{ $notif->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="px-4 py-8 text-center">
                            <span class="material-symbols-outlined text-slate-200 text-4xl mb-2">notifications_paused</span>
                            <p class="text-sm font-medium text-slate-500">All caught up!</p>
                            <p class="text-xs text-slate-400 mt-0.5">No new notifications at the moment.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Tombol Mark as Read -->
                @if($unreadNotifications->count() > 0)
                    <div class="px-4 py-2 border-t border-slate-100 bg-slate-50">
                        <form method="POST" action="{{ route('admin.notifications.read') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-center text-xs font-semibold text-teal-600 hover:text-teal-700 transition-colors">
                                Mark all as read
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <!-- Profile Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.away="open = false"
                class="flex items-center gap-3 hover:opacity-80 transition-opacity focus:outline-none">
                <div class="text-right hidden md:block">
                    <p class="text-sm font-medium text-slate-800">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                    <p class="text-xs text-red-500 font-medium">System God</p>
                </div>
                <div
                    class="w-10 h-10 rounded-full bg-slate-900 border-2 border-red-100 flex items-center justify-center overflow-hidden">
                    @if(auth()->user() && auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Admin"
                            class="w-full h-full object-cover">
                    @else
                        <span class="text-white font-medium text-sm">SA</span>
                    @endif
                </div>
            </button>

            <!-- Dropdown Menu Profil -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                class="absolute right-0 mt-3 w-48 bg-white border border-slate-200 rounded-2xl shadow-xl py-2 z-50"
                style="display: none;">

                <div class="px-4 py-2 border-b border-slate-100 mb-2">
                    <p class="text-xs text-slate-500">Signed in to Core</p>
                    <p class="text-sm font-medium text-slate-800 truncate">{{ auth()->user()->email ??
                        'admin@flowral.com' }}</p>
                </div>

                <a href="{{ route('member') }}"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-brand-teal transition-colors">
                    <span class="material-symbols-outlined text-[18px]">launch</span>
                    Member Area
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>