<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@lang('auth_page.register_title_page')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo_Flowral.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Material Symbols for Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
        }
    </style>

    <!-- Dark Mode Initializer -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body
    class="bg-brand-surface dark:bg-slate-900 text-brand-dark dark:text-white font-inter antialiased min-h-screen selection:bg-brand-orange selection:text-white flex">

    <!-- Bagian Kiri: Visual Premium (Dibalik posisinya) -->
    <div class="hidden lg:flex lg:w-5/12 relative bg-[#1E2120] items-end p-12 overflow-hidden">
        <!-- Gambar Cover Kreatif -->
        <img src="{{ asset('img/register.jpg') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-luminosity" alt="Creative Team">
        <div class="absolute inset-0 bg-gradient-to-t from-[#1E2120] via-brand-dark/50 to-transparent"></div>
        <div class="absolute inset-0 bg-brand-orange/5 mix-blend-overlay"></div>

        <!-- Callout Banner -->
        <div class="relative z-10 max-w-sm mb-10">
            <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-10 h-10 object-contain mb-6">
            <h2 class="font-outfit text-4xl font-medium text-white mb-4 leading-tight">@lang('auth_page.start_building_1')
                <br />@lang('auth_page.start_building_2')
            </h2>
            <p class="text-white/60 font-light text-sm leading-relaxed">@lang('auth_page.join_teams')</p>
        </div>
    </div>

    <!-- Bagian Kanan: Form -->
    <div
        class="w-full lg:w-7/12 flex flex-col justify-center px-8 md:px-20 lg:px-24 xl:px-40 relative overflow-hidden bg-white dark:bg-slate-800">
        <!-- Glow Halus di Pojok Kanan Atas -->
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-brand-orange/5 blur-[120px] rounded-full -z-10 pointer-events-none translate-x-[20%] translate-y-[-20%]">
        </div>

        <div class="w-full max-w-md mx-auto z-10 py-10">

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
                <button x-data="{ isDark: document.documentElement.classList.contains('dark') }"
                    @click="
                isDark = !isDark;
                if(isDark) {
                    document.documentElement.classList.add('dark');
                    localStorage.theme = 'dark';
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.theme = 'light';
                }
            "
                    class="relative p-2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors rounded-full hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none"
                    aria-label="Toggle Dark Mode">
                    <span x-show="isDark" x-cloak class="material-symbols-outlined text-[20px]">light_mode</span>
                    <span x-show="!isDark" class="material-symbols-outlined text-[20px]">dark_mode</span>
                </button>
            </div>

            <!-- Logo Mobile Only -->
            <a href="{{ url('/') }}"
                class="flex lg:hidden items-center gap-3 mb-12 w-fit hover:opacity-80 transition-opacity">
                <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-8 h-8 object-contain">
                <span
                    class="font-outfit font-semibold text-xl tracking-wide text-brand-dark dark:text-white">Flowral.</span>
            </a>

            <div>
                <h1 class="font-outfit text-3xl font-medium text-brand-dark dark:text-white mb-3">@lang('auth_page.create_account')</h1>
                <p class="text-brand-slate dark:text-slate-300 text-sm font-light mb-8">@lang('auth_page.setup_profile')</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name"
                        class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.full_name_label')</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="@lang('auth_page.full_name_placeholder')" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email"
                        class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.work_email_label')</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="@lang('auth_page.email_placeholder')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password"
                        class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.password_label')</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1.5">
                    <label for="password_confirmation"
                        class="block text-xs font-semibold tracking-wide text-brand-slate dark:text-slate-300">@lang('auth_page.password_confirm_label')</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="w-full px-4 py-3 bg-brand-surface dark:bg-slate-900 border border-brand-teal/20 dark:border-brand-teal/30 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 dark:placeholder:text-slate-300 dark:text-slate-300"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Terms -->
                <div class="flex items-start gap-2 pt-2">
                    <input id="terms" type="checkbox" required
                        class="w-4 h-4 rounded border-brand-teal/30 text-brand-orange focus:ring-brand-orange bg-white dark:bg-slate-800 cursor-pointer mt-0.5" />
                    <label for="terms"
                        class="text-[13px] font-light text-brand-slate dark:text-slate-300 leading-snug">
                        @lang('auth_page.agree_terms') <a href="#"
                            class="font-medium text-brand-dark dark:text-white hover:text-brand-orange transition-colors">@lang('auth_page.terms_link')</a>
                        @lang('auth_page.and') <a href="#"
                            class="font-medium text-brand-dark dark:text-white hover:text-brand-orange transition-colors">@lang('auth_page.privacy_link')</a>.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 bg-brand-orange text-white rounded-xl font-medium text-sm hover:bg-[#CC6800] transition-all shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 mt-6">
                    @lang('auth_page.create_workspace_btn')
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
                @lang('auth_page.already_have_account')
                <a href="{{ route('login') }}"
                    class="font-medium text-brand-dark dark:text-white hover:text-brand-orange transition-colors">@lang('auth_page.sign_in_link')</a>
            </p>
        </div>
    </div>
</body>

</html>
