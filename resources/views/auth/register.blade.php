<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account | Flowral</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-brand-surface text-brand-dark font-inter antialiased min-h-screen selection:bg-brand-orange selection:text-white flex">

    <!-- Bagian Kiri: Visual Premium (Dibalik posisinya) -->
    <div class="hidden lg:flex lg:w-5/12 relative bg-[#1E2120] items-end p-12 overflow-hidden">
        <!-- Gambar Cover Kreatif -->
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2000&auto=format&fit=crop"
            class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-luminosity" alt="Creative Team">
        <div class="absolute inset-0 bg-gradient-to-t from-[#1E2120] via-brand-dark/50 to-transparent"></div>
        <div class="absolute inset-0 bg-brand-orange/5 mix-blend-overlay"></div>

        <!-- Callout Banner -->
        <div class="relative z-10 max-w-sm mb-10">
            <div
                class="w-10 h-10 rounded-full bg-brand-orange/20 flex items-center justify-center mb-6 border border-brand-orange/30">
                <svg class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h2 class="font-outfit text-4xl font-medium text-white mb-4 leading-tight">Start building <br />your future.
            </h2>
            <p class="text-white/60 font-light text-sm leading-relaxed">Join over 10,000 forward-thinking teams who
                organize their chaotic work into a beautiful, unified workspace.</p>
        </div>
    </div>

    <!-- Bagian Kanan: Form -->
    <div
        class="w-full lg:w-7/12 flex flex-col justify-center px-8 md:px-20 lg:px-24 xl:px-40 relative overflow-hidden bg-white">
        <!-- Glow Halus di Pojok Kanan Atas -->
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-brand-orange/5 blur-[120px] rounded-full -z-10 pointer-events-none translate-x-[20%] translate-y-[-20%]">
        </div>

        <div class="w-full max-w-md mx-auto z-10 py-10">
            <!-- Logo Mobile Only -->
            <a href="{{ url('/') }}"
                class="flex lg:hidden items-center gap-3 mb-12 w-fit hover:opacity-80 transition-opacity">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-outfit font-semibold text-xl tracking-wide text-brand-dark">Flowral.</span>
            </a>

            <div>
                <h1 class="font-outfit text-3xl font-medium text-brand-dark mb-3">Create your account</h1>
                <p class="text-brand-slate text-sm font-light mb-8">Setup your profile to start creating workspaces.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name" class="block text-xs font-semibold tracking-wide text-brand-slate">Full
                        Name</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name"
                        class="w-full px-4 py-3 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40"
                        placeholder="Johnathan Doe" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold tracking-wide text-brand-slate">Work
                        Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40"
                        placeholder="john@company.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password"
                        class="block text-xs font-semibold tracking-wide text-brand-slate">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1.5">
                    <label for="password_confirmation"
                        class="block text-xs font-semibold tracking-wide text-brand-slate">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="w-full px-4 py-3 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[11px] text-red-500 font-medium" />
                </div>

                <!-- Terms -->
                <div class="flex items-start gap-2 pt-2">
                    <input id="terms" type="checkbox" required
                        class="w-4 h-4 rounded border-brand-teal/30 text-brand-orange focus:ring-brand-orange bg-white cursor-pointer mt-0.5" />
                    <label for="terms" class="text-[13px] font-light text-brand-slate leading-snug">
                        I agree to Flowral's <a href="#"
                            class="font-medium text-brand-dark hover:text-brand-orange transition-colors">Terms of
                            Service</a> and <a href="#"
                            class="font-medium text-brand-dark hover:text-brand-orange transition-colors">Privacy
                            Policy</a>.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 bg-brand-orange text-white rounded-xl font-medium text-sm hover:bg-[#CC6800] transition-all shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 mt-6">
                    Create Workspace
                </button>
            </form>

            <p class="mt-8 text-center text-[13px] text-brand-slate font-light">
                Already have an account?
                <a href="{{ route('login') }}"
                    class="font-medium text-brand-dark hover:text-brand-orange transition-colors">Sign in</a>
            </p>
        </div>
    </div>
</body>

</html>
