<div class="flex items-center gap-4">
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-manrope tracking-tight font-bold text-lg bg-gradient-primary-cta text-white px-6 py-2 rounded-md hover:opacity-90 transition-all shadow-sm">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="font-manrope tracking-tight font-bold text-lg text-slate-500 hover:text-cyan-600 px-4 py-2 transition-all">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="font-manrope tracking-tight font-bold text-lg bg-gradient-primary-cta text-white px-6 py-2 rounded-md hover:opacity-90 transition-all shadow-sm">
                        Sign Up
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</div>
