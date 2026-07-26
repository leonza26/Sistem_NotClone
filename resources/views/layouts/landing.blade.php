<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'home') | Flowral — The Elegant Workspace for Modern Teams</title>
    <!-- PENTING: Link Material Symbols -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gsap-hidden {
            visibility: hidden;
            opacity: 0;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F5FAFB;
        }

        ::-webkit-scrollbar-thumb {
            background: #81B4C5;
            border-radius: 4px;
        }

        /* Gradient Text */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, #E57500 0%, #512500 100%);
        }
    </style>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body
    class="bg-brand-surface dark:bg-slate-900 text-brand-dark dark:text-white font-inter antialiased overflow-x-hidden selection:bg-brand-orange selection:text-white">

    <!-- 1. Navbar (Floating Glass) -->
    <nav
        class="fixed w-full z-50 top-0 transition-all duration-500 bg-brand-surface/60 dark:bg-slate-900/80 backdrop-blur-xl border-b border-brand-teal/10 dark:border-brand-teal/20">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-brand-surface" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span
                    class="font-outfit font-semibold text-xl tracking-wide text-brand-dark dark:text-white">Flowral.</span>
            </div>

            @if(request()->routeIs('landing.page'))
                <div class="hidden md:flex gap-10 font-inter font-light text-sm text-brand-slate dark:text-slate-300">
                    <a href="#features" class="hover:text-brand-orange transition-colors">@lang('landing.features')</a>
                    <a href="#testimonials" class="hover:text-brand-orange transition-colors">@lang('landing.testimonials')</a>
                    <a href="#pricing" class="hover:text-brand-orange transition-colors">@lang('landing.pricing')</a>
                </div>
            @endif

            <div class="flex items-center gap-5">
                @auth
                    <a href="{{ route('member') }}"
                        class="px-5 py-2.5 text-sm font-medium bg-brand-orange text-white rounded-full shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        @lang('landing.dashboard')
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-inter font-medium text-sm text-brand-slate dark:text-slate-300 hover:text-brand-dark dark:hover:text-white transition-colors">@lang('landing.sign_in')</a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-medium bg-brand-orange text-white rounded-full shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        @lang('landing.get_started')
                    </a>
                @endauth

                <!-- Language Toggle Button -->
                <div x-data="{ openLang: false }" class="relative z-50 mt-1">
                    <button @click="openLang = !openLang" @click.away="openLang = false" class="flex items-center gap-1 px-3 py-1.5 text-[12px] font-bold text-brand-slate dark:text-slate-300 hover:text-brand-dark dark:hover:text-white transition-colors rounded-full uppercase focus:outline-none tracking-widest border border-transparent hover:border-brand-teal/10 dark:hover:border-brand-teal/20">
                        {{ app()->getLocale() }}
                        <span class="material-symbols-outlined text-[16px] transition-transform duration-200" :class="openLang ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    
                    <div x-show="openLang" x-transition.opacity.duration.200ms
                        class="absolute right-0 mt-2 w-28 bg-white dark:bg-slate-800 border border-brand-teal/10 dark:border-brand-teal/20 rounded-xl shadow-[0_4px_20px_-10px_rgba(48,71,78,0.1)] overflow-hidden z-50 py-1" style="display: none;">
                        <a href="{{ route('lang.switch', 'id') }}" class="block px-4 py-2 text-xs font-semibold {{ app()->getLocale() === 'id' ? 'bg-brand-surface dark:bg-slate-700 text-brand-orange' : 'text-brand-slate dark:text-slate-300 hover:bg-gray-50 dark:hover:bg-slate-700' }}">🇮🇩 IND</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 text-xs font-semibold {{ app()->getLocale() === 'en' ? 'bg-brand-surface dark:bg-slate-700 text-brand-orange' : 'text-brand-slate dark:text-slate-300 hover:bg-gray-50 dark:hover:bg-slate-700' }}">🇺🇸 ENG</a>
                    </div>
                </div>

                <!-- Dark Mode Toggle Button (Alpine.js) -->
                <button x-data="{ isDark: document.documentElement.classList.contains('dark') }" @click="
                isDark = !isDark; 
                if(isDark) { 
                    document.documentElement.classList.add('dark'); 
                    localStorage.theme = 'dark'; 
                } else { 
                    document.documentElement.classList.remove('dark'); 
                    localStorage.theme = 'light'; 
                }
            " class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-full hover:bg-slate-100 focus:outline-none"
                    aria-label="Toggle Dark Mode">
                    <span x-show="isDark" x-cloak class="material-symbols-outlined text-[20px]">light_mode</span>
                    <span x-show="!isDark" class="material-symbols-outlined text-[20px]">dark_mode</span>
                </button>
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- 7. Bottom CTA & Footer -->
    <footer class="bg-white dark:bg-slate-800 border-t border-brand-teal/10 dark:border-brand-teal/20 pt-32 pb-12">
        <div class="max-w-4xl mx-auto px-6 text-center mb-32 cta-section gsap-hidden">
            <h2 class="font-outfit text-5xl md:text-6xl font-medium text-brand-dark dark:text-white mb-8">@lang('landing.cta_title')</h2>
            <p class="text-brand-slate dark:text-slate-300 text-xl font-light mb-12">@lang('landing.cta_desc')</p>
            <a href="{{ route('register') }}"
                class="inline-block px-10 py-5 text-lg font-medium bg-brand-dark text-white rounded-full hover:bg-brand-slate shadow-xl dark:shadow-none hover:shadow-2xl hover:-translate-y-1 transition-all">
                @lang('landing.cta_btn')
            </a>
        </div>

        <div
            class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center border-t border-brand-teal/10 dark:border-brand-teal/20 pt-8">
            <div class="flex flex-col md:flex-row items-center gap-3 md:gap-4 mb-6 md:mb-0">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded bg-brand-dark flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-outfit font-medium text-lg text-brand-dark dark:text-white">Flowral</span>
                </div>
                <span class="hidden md:block text-brand-slate/40 dark:text-slate-300">|</span>
                <div
                    class="flex items-center gap-1.5 text-sm text-brand-slate dark:text-slate-300 font-light mt-1 md:mt-0 text-center">
                    <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    <span>Developed by <strong>Leon | Software Engineer</strong></span>
                </div>
            </div>
            <div class="flex gap-8 text-sm text-brand-slate dark:text-slate-300 font-light">
                <div class="flex gap-8 text-sm text-brand-slate dark:text-slate-300 font-light">
                    <a href="{{ route('landing.privacy') }}"
                        class="hover:text-brand-dark dark:hover:text-white transition-colors">@lang('landing.privacy')</a>
                    <a href="{{ route('landing.terms') }}"
                        class="hover:text-brand-dark dark:hover:text-white transition-colors">@lang('landing.terms')</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP Custom Animations Tailwind Plugin (Add inline styles for Marquee) -->
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee {
            animation: marquee 25s linear infinite;
        }
    </style>

    <!-- GSAP Initializations -->
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                // Ensure elements are visible for GSAP to animate from
                gsap.utils.toArray('.gsap-hidden').forEach(el => {
                    el.classList.remove('gsap-hidden');
                });

                // 1. Hero Text Sequence
                const heroTl = gsap.timeline();
                heroTl.fromTo(".hero-anim", {
                    y: 40,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 1.2,
                    stagger: 0.15,
                    ease: "power3.out"
                });

                // 2. Hero Image Scaling & Parallax
                heroTl.fromTo(".hero-img-wrap", {
                    y: 100,
                    opacity: 0,
                    scale: 0.95,
                    rotationX: 10
                }, {
                    y: 0,
                    opacity: 1,
                    scale: 1,
                    rotationX: 0,
                    duration: 1.5,
                    ease: "expo.out"
                },
                    "-=0.8"
                );

                // Parallax Effect on Image scroll
                gsap.to(".hero-img-wrap img", {
                    yPercent: 15,
                    ease: "none",
                    scrollTrigger: {
                        trigger: ".hero-img-wrap",
                        start: "top bottom",
                        end: "bottom top",
                        scrub: true
                    }
                });

                // 3. Alternating Showcase Features
                gsap.utils.toArray('.showcase-row').forEach((row, i) => {
                    const text = row.querySelector('.showcase-text');
                    const img = row.querySelector('.showcase-img');

                    const tl = gsap.timeline({
                        scrollTrigger: {
                            trigger: row,
                            start: "top 75%",
                            toggleActions: "play none none reverse"
                        }
                    });

                    // Cek posisi kiri atau kanan
                    const xOffset = i % 2 === 0 ? -50 : 50;

                    tl.fromTo(text, {
                        x: xOffset,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 1,
                        ease: "power3.out"
                    }).fromTo(img, {
                        x: -xOffset,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 1,
                        ease: "power3.out"
                    },
                        "-=0.7"
                    );
                });

                // 4. Bento Grid Reveal
                gsap.fromTo(".bento-header", {
                    y: 30,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 1,
                    scrollTrigger: {
                        trigger: ".bento-header",
                        start: "top 80%"
                    }
                });

                gsap.fromTo(".bento-item", {
                    y: 50,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "back.out(1.2)",
                    scrollTrigger: {
                        trigger: ".bento-item",
                        start: "top 85%"
                    }
                });

                // 5. Pricing Cards
                gsap.fromTo(".pricing-card", {
                    y: 40,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.2,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: "#pricing",
                        start: "top 70%"
                    }
                });

                // 6. Bottom CTA
                gsap.fromTo(".cta-section", {
                    scale: 0.95,
                    opacity: 0
                }, {
                    scale: 1,
                    opacity: 1,
                    duration: 1,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: ".cta-section",
                        start: "top 80%"
                    }
                });

            }, 100);
        });
    </script>
</body>

</html>