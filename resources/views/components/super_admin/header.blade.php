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
        <!-- Quick Action / Alert -->
        <button
            class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-full hover:bg-slate-100">
            <span class="material-symbols-outlined">notifications_active</span>
            <!-- Dot indicator -->
            <span
                class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-brand-surface"></span>
        </button>

        <!-- Profile Dropdown (Sederhana menggunakan Alpine) -->
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

            <!-- Dropdown Menu -->
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