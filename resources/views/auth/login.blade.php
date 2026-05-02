<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | Flowral</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-panel {
            background: rgba(245, 250, 251, 0.7);
            backdrop-filter: blur(12px);
        }

        .primary-gradient {
            background: linear-gradient(135deg, #316574 0%, #81b4c5 100%);
        }
    </style>
</head>

<body class="bg-surface font-body text-on-surface">
    <main class="min-h-screen flex flex-col md:flex-row overflow-hidden">
        <div
            class="w-full md:w-[45%] flex flex-col justify-center px-8 md:px-20 lg:px-32 py-12 bg-surface-container-lowest z-10">
            <div class="mb-12">
                <div class="flex items-center gap-2 mb-8">
                    <div class="w-10 h-10 primary-gradient rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white"
                            style="font-variation-settings: 'FILL' 1;">architecture</span>
                    </div>
                    <span class="font-headline font-extrabold text-2xl tracking-tighter text-primary">Flowral</span>
                </div>
                <h1 class="font-headline text-3xl font-bold tracking-tight text-on-surface mb-2">Selamat Datang kembali
                </h1>
                <p class="text-on-surface-variant text-sm font-medium">Silakan masukkan detail Anda untuk mengakses
                    ruang kerja Anda. </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                {{-- email --}}
                <div>
                    <label
                        class="block font-label text-xs font-semibold uppercase tracking-wider text-on-surface-variant mb-2"
                        for="email" :value="__('Email')">Email Address</label>
                    <input
                        class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-surface-container-lowest transition-all text-sm outline-none placeholder:text-outline"
                        id="email" placeholder="name@company.com" type="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- password --}}
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label
                            class="block font-label text-xs font-semibold uppercase tracking-wider text-on-surface-variant"
                            for="password" :value="__('Password')">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-semibold text-primary hover:text-on-primary-container transition-colors"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <input
                            class="w-full px-4 py-3 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary/50 focus:bg-surface-container-lowest transition-all text-sm outline-none placeholder:text-outline"
                            id="password" placeholder="••••••••" type="password" :value="old('password')" required
                            autocomplete="current-password" />
                        <button
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-outline-variant hover:text-primary transition-colors"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center gap-2">
                    <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary" id="remember"
                        type="checkbox" />
                    <label class="text-sm font-medium text-on-surface-variant" for="remember">Keep me logged in</label>
                </div>

                {{-- sign in --}}
                <x-primary-button>
                    {{ __('Sign In') }}
                </x-primary-button>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-outline-variant/20"></div>
                    </div>
                    <div class="relative flex justify-center text-xs font-semibold uppercase tracking-widest">
                        <span class="bg-surface-container-lowest px-4 text-outline">Or continue with</span>
                    </div>
                </div>

                <button
                    class="w-full py-3 px-6 bg-surface-container-highest flex items-center justify-center gap-3 text-on-surface font-headline font-semibold rounded-lg hover:bg-surface-container-high active:scale-[0.98] transition-all"
                    type="button">
                    <svg class="w-5 h-5" viewbox="0 0 24 24">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                            fill="#4285F4"></path>
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853"></path>
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"
                            fill="#FBBC05"></path>
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"
                            fill="#EA4335"></path>
                    </svg>
                    Google
                </button>
                <p class="text-center text-sm font-medium text-on-surface-variant">
                    Don't have an account? <a
                        class="text-primary font-bold hover:underline decoration-2 underline-offset-4"
                        href="{{ route('register') }}">Create workspace</a>
                </p>
            </form>
        </div>
        <div class="hidden md:flex w-[55%] relative items-center justify-center bg-surface overflow-hidden">
            <div class="absolute top-0 right-0 w-full h-full opacity-40">
                <div class="absolute top-[-10%] right-[-10%] w-96 h-96 rounded-full bg-primary-container blur-[100px]">
                </div>
                <div
                    class="absolute bottom-[-10%] left-[-10%] w-96 h-96 rounded-full bg-secondary-container blur-[100px]">
                </div>
            </div>
            <div class="relative z-10 max-w-lg text-center p-12">
                <div class="mb-12 flex justify-center">
                    <div
                        class="w-72 h-72 rounded-3xl overflow-hidden shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-700">
                        <img class="w-full h-full object-cover"
                            data-alt="Modern minimalist office interior with clean architectural lines, large windows, and soft natural sunlight casting gentle shadows"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWp0VZupMS2d1iW8NlK0FyLq-Uznv6DxkYGeg9R3cDeyx5CWaUdOANI6jmZy8jV_KZuSQNEyGQ_icwTJvZCOUH_Jnx1_wo2mcX1UuF2uyy0UyknezDPgJ3B5Y4c4mtiVtHmUCIZDet0P8Nxdhj685M7Ceak_ZxPMd6b-xmZAPQMqhlvVi_7fkDfiRIaIVPl0_OU-tKt7xgxxSQPrQ8V4FJGmX9zJBDkEqPCgeclpXIV8Lu3jxM3fFxY12b03hYutGCHud6ZCZoOLs" />
                    </div>
                </div>
                <div class="glass-panel p-10 rounded-3xl text-left border border-white/20 shadow-xl">
                    <span class="material-symbols-outlined text-primary-fixed-dim text-5xl mb-4"
                        style="font-variation-settings: 'FILL' 1;">format_quote</span>
                    <h2 class="font-headline text-2xl font-bold text-on-surface mb-4 leading-tight italic">
                        "Structure is not the cage of creativity, but the vessel that allows it to flow with purpose."
                    </h2>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover"
                                data-alt="Portrait of a professional architect in a creative studio setting, smiling with soft bokeh background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYIVcSlvpVW-Qctpt0xnZP-TjHOlUukBOx7bTX7cZOhCUwQttKYz2a8NbYU4Bq_6NHj29GA58IIPYNh28C6FqH3d6yggqtZ8wYDm_UPHaSShg3Tr8QLIdu_K7WICVsKaB0-c-Fq-CKYVH71fWDkUfo5V7etslTylKwBiW5XgvRlzoDxsAG2EJtkee0w_lyIMiOsGuF8JjvJZV_KqYe-Lreso7w8URbuXEXQtaltoo4S9ySg4VqBNs85kn7RjNb24pjZmNMgtczMww" />
                        </div>
                        <div>
                            <p class="font-headline font-bold text-on-surface text-sm">Adrian Thorne</p>
                            <p class="font-label text-xs text-on-surface-variant font-medium">Principal Architect,
                                Lumina Labs</p>
                        </div>
                    </div>
                </div>
                <div class="mt-12 flex justify-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-primary"></div>
                    <div class="w-2 h-2 rounded-full bg-outline-variant/30"></div>
                    <div class="w-2 h-2 rounded-full bg-outline-variant/30"></div>
                </div>
            </div>
            <div class="absolute bottom-12 left-12 flex items-center gap-6">
                <div class="flex -space-x-3">
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-slate-200"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-slate-300"></div>
                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-slate-400"></div>
                </div>
                <p class="text-xs font-semibold text-on-surface-variant tracking-wide">TRUSTED BY 200+ ARCHITECTURAL
                    FIRMS</p>
            </div>
        </div>
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full md:w-[45%] p-6 flex justify-between items-center text-[10px] font-label font-bold text-outline uppercase tracking-widest">
        <span>© 2026 Flowral</span>
        <div class="flex gap-4">
            <a class="hover:text-primary transition-colors" href="#">PRIVACY</a>
            <a class="hover:text-primary transition-colors" href="#">TERMS</a>
        </div>
    </footer>
</body>

</html>


{{-- <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
            required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form> --}}
