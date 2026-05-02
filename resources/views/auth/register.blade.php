<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Register | Flowral</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .editorial-gradient {
            background: linear-gradient(135deg, #316574 0%, #81b4c5 100%);
        }

        .glass-panel {
            background: rgba(245, 250, 251, 0.7);
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-surface font-body text-on-surface min-h-screen flex flex-col">
    <!-- Top Navigation Anchor (Manual suppression check: Login/Register usually has minimal nav) -->
    <header
        class="w-full top-0 left-0 z-50 bg-[#f5fafb] flex justify-between items-center px-8 md:px-12 py-6 max-w-[1440px] mx-auto">
        <div class="text-2xl font-bold text-[#316574] tracking-tighter font-headline">
            Flowral
        </div>
        <div class="flex items-center gap-4">
            <span class="text-slate-500 font-medium hidden md:block">Sudah punya akun?</span>
            <a class="text-[#316574] font-bold border-b-2 border-[#316574] transition-all hover:opacity-80 active:opacity-60"
                href="#">Log In</a>
        </div>
    </header>
    <main class="flex-grow flex items-center justify-center p-4 md:p-8">
        <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            <!-- Branding & Testimonial Column (The Editorial Side) -->
            <div class="lg:col-span-5 flex flex-col justify-center space-y-10 pr-0 lg:pr-12">
                <div class="space-y-4">
                    <h1
                        class="font-headline text-4xl md:text-5xl font-extrabold tracking-tight text-primary leading-tight">
                        Rancang workflow <br /> tim Anda dengan<br /><span
                            class="text-tertiary-container">Flowral.</span>
                    </h1>
                    <p class="text-on-surface-variant text-lg max-w-md">
                        Flowral adalah workspace modern berbasis AI yang membantu Anda mengelola tugas, ide, dan
                        dokumentasi dalam satu sistem yang terstruktur dan efisien.
                    </p>
                </div>
                <!-- Feature Points (Asymmetric Layout) -->
                <div class="space-y-6">
                    <div
                        class="flex items-start gap-4 p-4 rounded-xl surface-container-low transition-all hover:bg-surface-container">
                        <div
                            class="w-12 h-12 rounded-lg editorial-gradient flex items-center justify-center text-white shrink-0">
                            <span class="material-symbols-outlined" data-icon="task_alt">task_alt</span>
                        </div>
                        <div>
                            <h3 class="font-headline font-bold text-primary">Tasks</h3>
                            <p class="text-sm text-on-surface-variant">Prioritize with intentional negative space and
                                hierarchy.</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start gap-4 p-4 rounded-xl surface-container-low ml-4 lg:ml-8 transition-all hover:bg-surface-container">
                        <div
                            class="w-12 h-12 rounded-lg bg-tertiary-container flex items-center justify-center text-white shrink-0">
                            <span class="material-symbols-outlined" data-icon="description">description</span>
                        </div>
                        <div>
                            <h3 class="font-headline font-bold text-primary">Docs</h3>
                            <p class="text-sm text-on-surface-variant">Editorial layouts that make reading and writing a
                                pleasure.</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start gap-4 p-4 rounded-xl surface-container-low transition-all hover:bg-surface-container">
                        <div
                            class="w-12 h-12 rounded-lg editorial-gradient flex items-center justify-center text-white shrink-0">
                            <span class="material-symbols-outlined" data-icon="auto_awesome"
                                style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
                        </div>
                        <div>
                            <h3 class="font-headline font-bold text-primary">AI</h3>
                            <p class="text-sm text-on-surface-variant">Intelligent curation that organizes your thoughts
                                instantly.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Social Proof / Testimonial -->
                <div class="pt-6">
                    <div
                        class="glass-panel p-6 rounded-2xl border border-white/40 shadow-sm italic text-on-surface-variant relative">
                        <span
                            class="material-symbols-outlined absolute -top-4 -left-2 text-primary/20 text-5xl select-none"
                            data-icon="format_quote">format_quote</span>
                        "Flowral changed how our studio manages projects. It's not just a tool; it's a digital
                        sanctuary for our
                        ideas."
                        <div class="mt-4 not-italic flex items-center gap-3">
                            <img alt="" class="w-8 h-8 rounded-full"
                                data-alt="close-up portrait of a professional woman with a warm smile in a brightly lit office setting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvJLK7-ZIuO56tDHbuVWvuUN7xFawJb3vh8WO-P8QE0rHGBK5M44MiNwylYB5iTLUDoHIoBRHbwlSSZvIdA5MIdE5zd_lCADKCZlD2vE2qsZsGe-fkjalvDkvgwQ2aKVwBpRXUs49T9yjQXguXDSIyYiIg3ru-VtAB7h19NQgrKBzO7eDSgA8VKU5axZMSAVRy5LSw14wjxD2PGGSZoMhChU-aaE2AnVoBitu1GTKj8t8LE5qSWdvI-0u4EgLeLaLx3jITqbQUghE" />
                            <span class="text-sm font-bold text-primary">Elena Rossi, Creative Director</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form Column -->
            <div class="lg:col-span-7 flex items-center">
                <div
                    class="bg-surface-container-lowest p-8 md:p-12 rounded-[2rem] w-full shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] border border-outline-variant/10">
                    <div class="mb-10">
                        <h2 class="font-headline text-3xl font-bold text-primary">Create Account</h2>
                        <p class="text-on-surface-variant mt-2">Join 10,000+ curators building the future.</p>
                    </div>

                    {{-- register form --}}
                    <form class="space-y-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary font-label"
                                for="name" :value="__('Name')">Full
                                Name</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                                    data-icon="person">person</span>
                                <input
                                    class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/50 transition-all text-on-surface placeholder:text-outline"
                                    id="name" name="name" placeholder="Johnathan Doe" type="text"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Work Email -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary font-label"
                                for="email" :value="__('Email')">Work
                                Email</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                                    data-icon="mail">mail</span>
                                <input
                                    class="w-full pl-12 pr-4 py-4 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/50 transition-all text-on-surface placeholder:text-outline"
                                    id="email" name="email" placeholder="john@company.com" type="email"
                                    :value="old('email')" required autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary font-label"
                                for="password" :value="__('Password')">Password</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                                    data-icon="lock">lock</span>
                                <input
                                    class="w-full pl-12 pr-12 py-4 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/50 transition-all text-on-surface placeholder:text-outline"
                                    id="password" name="password" placeholder="••••••••" type="password" required
                                    autocomplete="new-password" />
                                <button
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                                    type="button">
                                    <span class="material-symbols-outlined" data-icon="visibility">visibility</span>
                                </button>
                            </div>
                            <p class="text-[10px] text-outline-variant italic">Must be at least 12 characters with one
                                symbol.</p>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary font-label"
                                for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline"
                                    data-icon="lock">lock</span>
                                <input
                                    class="w-full pl-12 pr-12 py-4 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/50 transition-all text-on-surface placeholder:text-outline"
                                    id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                                    type="password" required autocomplete="new-password" />
                                <button
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors"
                                    type="button">
                                    <span class="material-symbols-outlined" data-icon="visibility">visibility</span>
                                </button>
                            </div>
                            <p class="text-[10px] text-outline-variant italic">Must be at least 12 characters with one
                                symbol.</p>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start gap-3 py-2">
                            <div class="flex items-center h-5">
                                <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary"
                                    id="terms" name="terms" type="checkbox" />
                            </div>
                            <div class="text-sm">
                                <label class="text-on-surface-variant leading-relaxed" for="terms">
                                    I agree to the <a class="text-primary font-bold hover:underline"
                                        href="#">Terms of Service</a> and <a
                                        class="text-primary font-bold hover:underline" href="#">Privacy
                                        Policy</a>.
                                </label>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <x-primary-button_reg>
                            {{ __('Create Account') }}
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform"
                                data-icon="arrow_forward">arrow_forward</span>
                        </x-primary-button_reg>

                        <!-- Alternative Sign Ups -->
                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-outline-variant/30"></div>
                            </div>
                            <div class="relative flex justify-center text-xs uppercase"><span
                                    class="bg-surface-container-lowest px-4 text-outline font-label tracking-widest">Or
                                    sign up
                                    with</span></div>
                        </div>
                        <div class="grid grid-cols gap-4">
                            <button
                                class="flex items-center justify-center gap-2 py-3 px-4 bg-surface-container-low rounded-xl font-bold text-sm text-primary hover:bg-surface-container transition-colors"
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
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- Footer Anchor -->
    <footer class="w-full bg-[#f5fafb] border-t border-slate-200">
        <div class="flex flex-col md:flex-row justify-between items-center px-12 py-8 w-full max-w-[1440px] mx-auto">
            <div class="font-manrope font-bold text-[#316574] mb-4 md:mb-0">
                Architectur Curator
            </div>
            <div class="flex gap-8 items-center text-slate-500 font-inter text-sm tracking-wide">
                <a class="hover:text-[#316574] transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-[#316574] transition-colors" href="#">Terms of Service</a>
                <a class="hover:text-[#316574] transition-colors" href="#">Cookie Policy</a>
            </div>
            <div class="text-slate-500 font-inter text-sm mt-4 md:mt-0">
                © 2024 Architectur Curator. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>
{{--
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
            required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
            required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
            name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form> --}}
