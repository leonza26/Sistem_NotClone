<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@lang('auth_page.login_title_page')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Material Symbols for Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
        }
    </style>

    <!-- Dark Mode Initializer -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body
    class="bg-brand-surface dark:bg-slate-900 text-brand-dark dark:text-white font-inter antialiased min-h-screen selection:bg-brand-orange selection:text-white flex">

    <!-- Bagian Kiri: Form -->
    <div
        class="w-full lg:w-1/2 flex flex-col justify-center px-8 md:px-20 lg:px-24 xl:px-32 relative overflow-hidden bg-white dark:bg-slate-800">
        <!-- Glow Halus di Pojok Kiri Atas -->
        <div
            class="absolute top-0 left-0 w-[500px] h-[500px] bg-brand-teal/10 blur-[120px] rounded-full -z-10 pointer-events-none translate-x-[-20%] translate-y-[-20%]">
        </div>

        <div class="w-full max-w-sm mx-auto z-10">

            <!-- Navbar Auth (Language & Dark Mode Toggle) -->
            <div class="absolute top-6 right-6 lg:right-10 flex items-center gap-3 z-50">
                <!-- Language Toggle Button -->
                <div x-data="{ openLang: false }" class="relative z-50 mt-1">
                    <button @click="openLang = !openLang" @click.away="openLang = false"
                        class="flex items-center gap-1 px-3 py-1.5 text-[12px] font-bold text-brand-slate dark:text-slate-300 hover:text-brand-dark dark:hover:text-white transition-colors rounded-full uppercase focus:outline-none tracking-widest border border-transparent hover:border-brand-teal/10 dark:hover:border-brand-teal/20">
                        {{ app()->getLocale() }}
                        <span class="material-symbols-outlined text-[16px] transition-transform duration-200"
                            :class="openLang ? 'rotate-180' : ''">expand_more</span>
                    </button>

                    <div x-show="openLang" x-transition.opacity.duration.200ms
                        class="absolute right-0 mt-2 w-28 bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 rounded-xl shadow-[0_4px_20px_-10px_rgba(48,71,78,0.1)] overflow-hidden z-50 py-1"
                        style="display: none;">
                        <a href="{{ route('lang.switch', 'id') }}"
                            class="block px-4 py-2 text-xs font-semibold {{ app()->getLocale() === 'id' ? 'bg-brand-surface dark:bg-slate-700 text-brand-orange' : 'text-brand-slate dark:text-slate-300 hover:bg-gray-50 dark:hover:bg-slate-700' }}">🇮🇩
                            IND</a>
                        <a href="{{ route('lang.switch', 'en') }}"
                            class="block px-4 py-2 text-xs font-semibold {{ app()->getLocale() === 'en' ? 'bg-brand-surface dark:bg-slate-700 text-brand-orange' : 'text-brand-slate dark:text-slate-300 hover:bg-gray-50 dark:hover:bg-slate-700' }}">🇺🇸
                            ENG</a>
                    </div>
                </div>

                <!-- Dark Mode Toggle Button -->
                <button x-data="{ isDark: document.documentElement.classList.contains('dark') }" @click="
                isDark = !isDark; 
                if(isDark) { 
                    document.documentElement.classList.add('dark'); 
                    localStorage.theme = 'dark'; 
                } else { 
                    document.documentElement.classList.remove('dark'); 
                    localStorage.theme = 'light'; 
                }
            " class="relative p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none"
                    aria-label="Toggle Dark Mode">
                    <span x-show="isDark" x-cloak class="material-symbols-outlined text-[20px]">light_mode</span>
                    <span x-show="!isDark" class="material-symbols-outlined text-[20px]">dark_mode</span>
                </button>
            </div>

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 mb-16 w-fit hover:opacity-80 transition-opacity">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span
                    class="font-outfit font-semibold text-xl tracking-wide text-brand-dark dark:text-white">Flowral.</span>
            </a>

            <div>
                <h1 class="font-outfit text-3xl font-medium text-brand-dark dark:text-white mb-3">
                    @lang('auth_page.welcome_back')</h1>
                <p class="text-brand-slate dark:text-slate-300 text-sm font-light mb-8">
                    @lang('auth_page.enter_credentials')</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />


            <!-- Alert Error (Misal: Akun di-suspend) -->
            @if (session('error'))
                <div
                    class="mb-5 bg-red-50 border border-red-200 text-red-600 px-4 py-3.5 rounded-xl flex items-start gap-3 shadow-sm dark:shadow-none">

                    <!-- Icon Peringatan (SVG Murni) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5 shrink-0 mt-0.5 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold tracking-tight">@lang('auth_page.access_denied')</h4>
                        <p class="text-xs font-medium mt-0.5 opacity-90 leading-relaxed">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div class="space-y-1.5">
                    <label for="email"
                        class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.email_label')</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="@lang('auth_page.email_placeholder')" />
                    <x-input-error :messages="$errors->get('email')"
                        class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label for="password"
                            class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.password_label')</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-[11px] font-medium text-brand-slate dark:text-slate-300 hover:text-brand-orange transition-colors">
                                @lang('auth_page.forgot_password')
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')"
                        class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2 pt-1">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 rounded border-brand-teal/30 text-brand-orange focus:ring-brand-orange bg-white dark:bg-slate-800 cursor-pointer" />
                    <label for="remember_me"
                        class="text-[13px] font-light text-brand-slate dark:text-slate-300 cursor-pointer select-none">@lang('auth_page.remember_me')</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 bg-brand-orange text-white rounded-xl font-medium text-sm hover:bg-[#CC6800] transition-all shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 mt-4">
                    @lang('auth_page.sign_in_btn')
                </button>
            </form>

            <!-- SSO / Divider -->
            <div class="relative py-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-brand-teal/10 dark:border-brand-teal/20"></div>
                </div>
                <div class="relative flex justify-center text-xs uppercase"><span
                        class="bg-white dark:bg-slate-800 px-4 text-brand-slate/50 tracking-widest font-medium">@lang('auth_page.or')</span>
                </div>
            </div>

            <!-- Alternative Login -->
            <a href="{{ route('google.login') }}"
                class="w-full py-3 px-4 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl font-medium text-sm text-brand-dark dark:text-white hover:bg-brand-teal/5 transition-colors flex items-center justify-center gap-3">
                <svg class="w-4 h-4" viewBox="0 0 24 24">
                    <path
                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                        fill="#4285F4" />
                    <path
                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                        fill="#34A853" />
                    <path
                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"
                        fill="#FBBC05" />
                    <path
                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"
                        fill="#EA4335" />
                </svg>
                @lang('auth_page.continue_google')
            </a>

            <p class="mt-8 text-center text-[13px] text-brand-slate dark:text-slate-300 font-light">
                @lang('auth_page.dont_have_account')
                <a href="{{ route('register') }}"
                    class="font-medium text-brand-dark dark:text-white hover:text-brand-orange transition-colors">@lang('auth_page.create_one')</a>
            </p>
        </div>
    </div>

    <!-- Bagian Kanan: Visual Premium -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-brand-dark items-end p-12 overflow-hidden">
        <!-- Gambar Cover yang Elegan -->
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2000&auto=format&fit=crop"
            class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-luminosity"
            alt="Modern Architecture">
        <!-- Gradien Lembut -->
        <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-dark/50 to-transparent"></div>
        <div class="absolute inset-0 bg-brand-teal/10 mix-blend-overlay"></div>

        <!-- Glass Panel Testimonial -->
        <div class="relative z-10 bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl max-w-lg">
            <h2 class="font-outfit text-2xl font-medium text-white mb-6 leading-snug">
                @lang('auth_page.quote')
            </h2>
            <div class="flex items-center gap-4">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop"
                    class="w-12 h-12 rounded-full border-2 border-white/20 object-cover" alt="Sarah Jenkins">
                <div>
                    <p class="font-outfit font-medium text-white text-sm">Sarah Jenkins</p>
                    <p class="text-white/60 text-xs font-light">Operations Director, Horizon Inc.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>