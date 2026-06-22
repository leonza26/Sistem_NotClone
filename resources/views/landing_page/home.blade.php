<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowral — The Elegant Workspace for Modern Teams</title>
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
</head>

<body
    class="bg-brand-surface text-brand-dark font-inter antialiased overflow-x-hidden selection:bg-brand-orange selection:text-white">

    <!-- 1. Navbar (Floating Glass) -->
    <nav
        class="fixed w-full z-50 top-0 transition-all duration-500 bg-brand-surface/60 backdrop-blur-xl border-b border-brand-teal/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-brand-surface" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-outfit font-semibold text-xl tracking-wide text-brand-dark">Flowral.</span>
            </div>

            <div class="hidden md:flex gap-10 font-inter font-light text-sm text-brand-slate">
                <a href="#features" class="hover:text-brand-orange transition-colors">Features</a>
                <a href="#testimonials" class="hover:text-brand-orange transition-colors">Testimonials</a>
                <a href="#pricing" class="hover:text-brand-orange transition-colors">Pricing</a>
            </div>

            <div class="flex items-center gap-5">
                @auth
                    <a href="{{ route('member') }}"
                        class="px-5 py-2.5 text-sm font-medium bg-brand-orange text-white rounded-full shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-inter font-medium text-sm text-brand-slate hover:text-brand-dark transition-colors">Sign
                        In</a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-medium bg-brand-orange text-white rounded-full shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        Get Started
                    </a>
                @endauth
            </div>
            
        </div>
    </nav>

    <!-- 2. Hero Section -->
    <section
        class="relative pt-40 pb-20 lg:pt-52 lg:pb-32 overflow-hidden flex flex-col items-center justify-center min-h-[90vh]">
        <!-- Glow Orbs -->
        <div
            class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-brand-teal/10 blur-[100px] rounded-full mix-blend-multiply -z-10 animate-blob">
        </div>
        <div
            class="absolute top-1/3 right-1/4 w-[500px] h-[500px] bg-brand-orange/5 blur-[100px] rounded-full mix-blend-multiply -z-10 animate-blob animation-delay-2000">
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center z-10">
            <div
                class="hero-anim gsap-hidden inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-brand-teal/20 text-brand-slate text-[11px] font-semibold tracking-widest uppercase mb-8 shadow-sm">
                <span>Introducing Flowral 1.0</span>
                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange animate-pulse"></span>
            </div>

            <h1
                class="hero-anim gsap-hidden font-outfit text-6xl md:text-8xl font-medium text-brand-dark leading-[1.05] tracking-tight mb-8">
                The new standard for <br />
                <span class="text-gradient font-semibold">productivity.</span>
            </h1>

            <p
                class="hero-anim gsap-hidden text-xl md:text-2xl text-brand-slate font-light max-w-2xl mx-auto mb-12 leading-relaxed">
                Experience a workspace that adapts to your mind. Say goodbye to scattered tools and embrace absolute
                clarity.
            </p>

            <div class="hero-anim gsap-hidden flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 text-base font-medium bg-brand-dark text-white rounded-full hover:bg-brand-slate transition-all w-full sm:w-auto shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Start creating for free
                </a>
            </div>
        </div>

        <!-- Hero App Mockup Image -->
        <div class="hero-img-wrap gsap-hidden w-full max-w-6xl mx-auto px-6 mt-24 relative z-20 perspective-1000">
            <div
                class="relative rounded-2xl md:rounded-[32px] p-2 bg-white/40 backdrop-blur-xl border border-white/60 shadow-[0_20px_80px_-20px_rgba(48,71,78,0.2)]">
                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=2000&auto=format&fit=crop"
                    alt="Flowral Dashboard"
                    class="w-full rounded-xl md:rounded-[24px] shadow-sm object-cover aspect-video">
            </div>
        </div>
    </section>

    <!-- 3. Logo Cloud / Marquee -->
    <section class="py-10 border-y border-brand-teal/10 bg-white overflow-hidden flex flex-col items-center">
        <p class="text-xs font-semibold tracking-widest text-brand-slate uppercase mb-8 text-center">Trusted by
            forward-thinking teams</p>
        <div
            class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
            <ul
                class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-marquee">
                <!-- Gunakan teks/svg statis sbg placeholder keren -->
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">ACME Corp</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">GlobalTech</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Quantum</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Nebula</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">StudioX</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Horizon</li>
            </ul>
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-marquee"
                aria-hidden="true">
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">ACME Corp</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">GlobalTech</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Quantum</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Nebula</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">StudioX</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40">Horizon</li>
            </ul>
        </div>
    </section>

    <!-- 4. Feature Showcase (Left-Right Alternating) -->
    <section id="features" class="py-32 bg-brand-surface relative">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Feature 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-16 mb-40 showcase-row">
                <div class="w-full lg:w-1/2 showcase-text">
                    <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-brand-dark mb-6 leading-tight">
                        Visualize your workflow. <br /><span class="text-brand-slate">In real-time.</span></h2>
                    <p class="text-brand-slate text-lg font-light leading-relaxed mb-8">
                        Our intuitive Kanban boards are designed to get out of your way. Drag, drop, and conquer your
                        tasks without the friction of traditional enterprise software.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-brand-dark font-medium"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Frictionless drag & drop</li>
                        <li class="flex items-center gap-3 text-brand-dark font-medium"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Custom columns & tags</li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/2 showcase-img">
                    <div class="rounded-3xl overflow-hidden border border-brand-teal/20 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?q=80&w=1000&auto=format&fit=crop"
                            alt="Kanban Feature" class="w-full h-auto">
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-16 showcase-row">
                <div class="w-full lg:w-1/2 showcase-text">
                    <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-brand-dark mb-6 leading-tight">
                        Collaboration that <br /><span class="text-brand-slate">feels natural.</span></h2>
                    <p class="text-brand-slate text-lg font-light leading-relaxed mb-8">
                        Discuss tasks right where the work happens. Flowral’s threaded comments bring context to your
                        conversations, eliminating the need for endless chat apps.
                    </p>
                    <a href="{{ route('register') }}"
                        class="text-brand-orange font-semibold hover:text-brand-brown transition-colors flex items-center gap-1">
                        Explore collaboration <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="w-full lg:w-1/2 showcase-img">
                    <div class="rounded-3xl overflow-hidden border border-brand-teal/20 shadow-2xl relative">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1000&auto=format&fit=crop"
                            alt="Team Collaboration" class="w-full h-auto">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. Bento Grid Deep Features -->
    <section class="py-32 bg-white border-t border-brand-teal/10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20 bento-header gsap-hidden">
                <h2 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark mb-6">Designed for scale.</h2>
                <p class="text-brand-slate text-xl font-light max-w-2xl mx-auto">Everything you need to manage complex
                    projects, beautifully organized into simple modules.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[320px]">
                <!-- Large Card -->
                <div
                    class="md:col-span-2 bg-brand-surface rounded-[32px] p-10 border border-brand-teal/10 hover:border-brand-teal/30 transition-colors flex flex-col justify-between bento-item gsap-hidden">
                    <div>
                        <div
                            class="w-10 h-10 rounded-full bg-white flex items-center justify-center mb-6 shadow-sm border border-brand-teal/10">
                            <svg class="w-5 h-5 text-brand-slate" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="font-outfit text-2xl font-medium text-brand-dark mb-3">Infinite Workspaces</h3>
                        <p class="text-brand-slate font-light">Create isolated environments for different teams,
                            clients, or side projects. Complete separation of concerns.</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=800&auto=format&fit=crop"
                        class="w-full h-32 object-cover rounded-xl mt-4 opacity-80 mix-blend-multiply"
                        alt="Workspaces">
                </div>

                <!-- Small Card -->
                <div class="bg-brand-dark rounded-[32px] p-10 flex flex-col justify-between bento-item gsap-hidden">
                    <div>
                        <div class="w-10 h-10 rounded-full bg-brand-slate flex items-center justify-center mb-6">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit text-2xl font-medium text-white mb-3">Bank-grade Security</h3>
                        <p class="text-brand-surface/70 font-light text-sm">Self-hostable architecture gives you
                            absolute control over your team's sensitive data.</p>
                    </div>
                </div>

                <!-- Small Card AI -->
                <div
                    class="md:col-span-3 lg:col-span-1 bg-gradient-to-br from-brand-orange to-[#ff9838] rounded-[32px] p-10 flex flex-col justify-between relative overflow-hidden bento-item gsap-hidden">
                    <div class="relative z-10">
                        <div
                            class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-bold rounded-full backdrop-blur-md mb-6">
                            COMING SOON</div>
                        <h3 class="font-outfit text-2xl font-medium text-white mb-3">AI Copilot</h3>
                        <p class="text-white/90 font-light">Automatically generate sub-tasks, summarize long threads,
                            and organize your schedule.</p>
                    </div>
                </div>

                <!-- Medium Card -->
                <div
                    class="md:col-span-3 lg:col-span-2 bg-brand-surface rounded-[32px] p-10 border border-brand-teal/10 flex flex-col justify-center items-center text-center bento-item gsap-hidden">
                    <h3 class="font-outfit text-3xl font-medium text-brand-dark mb-4">Fast. Blazing Fast.</h3>
                    <p class="text-brand-slate font-light max-w-md">Built on Laravel & Alpine.js. No heavy client-side
                        bloat. Just pure, unadulterated speed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Pricing Section -->
    <section id="pricing" class="py-32 bg-brand-surface">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark mb-6">Simple pricing.</h2>
                <p class="text-brand-slate text-xl font-light">Start for free, upgrade when you need superpowers.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Free Plan -->
                <div
                    class="bg-white rounded-[32px] p-10 border border-brand-teal/10 shadow-lg pricing-card gsap-hidden">
                    <h3 class="font-outfit text-2xl font-medium text-brand-dark mb-2">Starter</h3>
                    <p class="text-brand-slate font-light text-sm mb-6">Perfect for individuals and small teams.</p>
                    <div class="mb-8">
                        <span class="font-outfit text-5xl font-bold text-brand-dark">$0</span>
                        <span class="text-brand-slate">/forever</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-brand-slate font-light"><svg
                                class="w-5 h-5 text-brand-teal" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> 3 Workspaces</li>
                        <li class="flex items-center gap-3 text-brand-slate font-light"><svg
                                class="w-5 h-5 text-brand-teal" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Unlimited Tasks</li>
                        <li class="flex items-center gap-3 text-brand-slate font-light"><svg
                                class="w-5 h-5 text-brand-teal" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Up to 5 Members</li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full py-4 text-center rounded-full font-medium bg-brand-surface text-brand-dark hover:bg-brand-teal/10 transition-colors">
                        Get Started
                    </a>
                </div>

                <!-- Pro Plan -->
                <div
                    class="bg-brand-dark rounded-[32px] p-10 shadow-2xl relative overflow-hidden pricing-card gsap-hidden">
                    <div
                        class="absolute top-0 right-0 px-4 py-1 bg-brand-orange text-white text-xs font-bold rounded-bl-xl">
                        POPULAR</div>
                    <h3 class="font-outfit text-2xl font-medium text-white mb-2">Pro</h3>
                    <p class="text-brand-surface/70 font-light text-sm mb-6">For scaling organizations needing control.
                    </p>
                    <div class="mb-8">
                        <span class="font-outfit text-5xl font-bold text-white">$12</span>
                        <span class="text-brand-surface/70">/user/month</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Unlimited Workspaces</li>
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Unlimited Members</li>
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg> Advanced AI Features</li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full py-4 text-center rounded-full font-medium bg-brand-orange text-white hover:bg-orange-600 transition-colors">
                        Upgrade to Pro
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Bottom CTA & Footer -->
    <footer class="bg-white border-t border-brand-teal/10 pt-32 pb-12">
        <div class="max-w-4xl mx-auto px-6 text-center mb-32 cta-section gsap-hidden">
            <h2 class="font-outfit text-5xl md:text-6xl font-medium text-brand-dark mb-8">Ready to find your flow?</h2>
            <p class="text-brand-slate text-xl font-light mb-12">Join thousands of teams who have transformed the way
                they work.</p>
            <a href="{{ route('register') }}"
                class="inline-block px-10 py-5 text-lg font-medium bg-brand-dark text-white rounded-full hover:bg-brand-slate shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all">
                Create your workspace
            </a>
        </div>

        <div
            class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center border-t border-brand-teal/10 pt-8">
            <div class="flex flex-col md:flex-row items-center gap-3 md:gap-4 mb-6 md:mb-0">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded bg-brand-dark flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-outfit font-medium text-lg text-brand-dark">Flowral</span>
                </div>
                <span class="hidden md:block text-brand-slate/40">|</span>
                <div class="flex items-center gap-1.5 text-sm text-brand-slate font-light mt-1 md:mt-0 text-center">
                    <svg class="w-4 h-4 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    <span>Developed by <strong>Leon | Software Engineer</strong></span>
                </div>
            </div>
            <div class="flex gap-8 text-sm text-brand-slate font-light">
                <a href="#" class="hover:text-brand-dark">Privacy</a>
                <a href="#" class="hover:text-brand-dark">Terms</a>
                <a href="#" class="hover:text-brand-dark">Twitter</a>
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
