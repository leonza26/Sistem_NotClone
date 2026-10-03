<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Maintenance — Flowral</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo_Flowral.png') }}">

    <!-- PWA Meta Tags -->
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <meta name="theme-color" content="#282B2A">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Flowral">
    <link rel="apple-touch-icon" href="{{ asset('img/Logo_Flowral.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gsap-hidden { visibility: hidden; opacity: 0; }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, #00A3A3 0%, #004D4D 100%);
        }
    </style>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-brand-surface dark:bg-slate-900 text-brand-dark dark:text-white font-inter antialiased overflow-hidden selection:bg-brand-teal selection:text-white min-h-screen flex flex-col">

    <nav class="absolute w-full z-50 top-0 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 sm:h-20 flex justify-between items-center">
            <div class="flex items-center gap-2.5 sm:gap-3 opacity-60">
                <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-7 h-7 sm:w-8 sm:h-8 object-contain">
                <span class="font-outfit font-semibold text-lg sm:text-xl tracking-wide text-brand-dark dark:text-white">Flowral.</span>
            </div>
        </div>
    </nav>

    <main class="relative flex-1 flex flex-col items-center justify-center p-6">
        <!-- Glow Orbs -->
        <div class="absolute top-1/3 right-1/3 w-[600px] h-[600px] bg-brand-teal/10 blur-[120px] rounded-full mix-blend-multiply -z-10 animate-pulse"></div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center z-10 flex flex-col items-center">
            <div class="hero-anim gsap-hidden w-20 h-20 sm:w-24 sm:h-24 bg-white dark:bg-slate-800 border border-brand-teal/20 rounded-3xl flex items-center justify-center mb-6 sm:mb-8 shadow-sm">
                <svg class="w-9 h-9 sm:w-10 sm:h-10 text-brand-teal animate-spin-slow" style="animation: spin 8s linear infinite;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            
            <h1 class="hero-anim gsap-hidden font-outfit text-3xl sm:text-5xl md:text-7xl font-medium text-brand-dark dark:text-white leading-[1.15] sm:leading-[1.1] tracking-tight mb-4 sm:mb-6">
                Upgrading the <br/>
                <span class="text-gradient">workspace.</span>
            </h1>
            
            <p class="hero-anim gsap-hidden text-base sm:text-lg md:text-xl text-brand-slate dark:text-slate-300 font-light max-w-xl mx-auto mb-8 sm:mb-10 leading-relaxed">
                We're currently performing some scheduled maintenance to make Flowral even faster and more reliable. We'll be back shortly.
            </p>
            
            <div class="hero-anim gsap-hidden flex items-center justify-center gap-2 text-sm font-medium text-brand-slate dark:text-slate-400">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-orange opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-brand-orange"></span>
                </span>
                Systems currently offline
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.utils.toArray('.gsap-hidden').forEach(el => {
                el.classList.remove('gsap-hidden');
            });

            gsap.fromTo(".hero-anim", {
                y: 40,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 1.2,
                stagger: 0.15,
                ease: "power3.out"
            });
        });
    </script>
</body>
</html>