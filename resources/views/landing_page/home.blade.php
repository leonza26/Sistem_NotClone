@extends('layouts.landing')

@section('title', 'Flowral - The Elegant Workspace for Modern Teams')
@section('content')

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
                class="hero-anim gsap-hidden inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white dark:bg-slate-800 border border-brand-teal/20 dark:border-brand-teal/30 text-brand-slate dark:text-slate-300 text-[11px] font-semibold tracking-widest uppercase mb-8 shadow-sm dark:shadow-none">
                <span>@lang('landing.hero_badge')</span>
                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange animate-pulse"></span>
            </div>

            <h1
                class="hero-anim gsap-hidden font-outfit text-6xl md:text-8xl font-medium text-brand-dark dark:text-white leading-[1.05] tracking-tight mb-8">
                @lang('landing.hero_title_1') <br />
                <span class="text-gradient font-semibold">@lang('landing.hero_title_2')</span>
            </h1>

            <p
                class="hero-anim gsap-hidden text-xl md:text-2xl text-brand-slate dark:text-slate-300 font-light max-w-2xl mx-auto mb-12 leading-relaxed">
                @lang('landing.hero_desc')
            </p>

            <div class="hero-anim gsap-hidden flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 text-base font-medium bg-brand-dark text-white rounded-full hover:bg-brand-slate transition-all w-full sm:w-auto shadow-lg hover:shadow-xl hover:-translate-y-1">
                    @lang('landing.hero_btn')
                </a>
            </div>
        </div>

        <!-- Hero App Mockup Image -->
        <div class="hero-img-wrap gsap-hidden w-full max-w-6xl mx-auto px-6 mt-24 relative z-20 perspective-1000">
            <div
                class="relative rounded-2xl md:rounded-[32px] p-2 bg-white/40 backdrop-blur-xl border border-white/60 shadow-[0_20px_80px_-20px_rgba(48,71,78,0.2)]">
                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=2000&auto=format&fit=crop"
                    alt="Flowral Dashboard" class="w-full rounded-xl md:rounded-[24px] shadow-sm dark:shadow-none object-cover aspect-video">
            </div>
        </div>
    </section>

    <!-- 3. Logo Cloud / Marquee -->
    <section class="py-10 border-y border-brand-teal/10 dark:border-brand-teal/20 bg-white dark:bg-slate-800 overflow-hidden flex flex-col items-center">
        <p class="text-xs font-semibold tracking-widest text-brand-slate dark:text-slate-300 uppercase mb-8 text-center">@lang('landing.trusted_by')</p>
        <div
            class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-marquee">
                <!-- Gunakan teks/svg statis sbg placeholder keren -->
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">ACME Corp</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">GlobalTech</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Quantum</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Nebula</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">StudioX</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Horizon</li>
            </ul>
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-marquee"
                aria-hidden="true">
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">ACME Corp</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">GlobalTech</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Quantum</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Nebula</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">StudioX</li>
                <li class="font-outfit text-2xl font-bold text-brand-slate/40 dark:text-slate-300">Horizon</li>
            </ul>
        </div>
    </section>

    <!-- 4. Feature Showcase (Left-Right Alternating) -->
    <section id="features" class="py-32 bg-brand-surface dark:bg-slate-900 relative">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Feature 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-16 mb-40 showcase-row">
                <div class="w-full lg:w-1/2 showcase-text">
                    <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-brand-dark dark:text-white mb-6 leading-tight">
                        @lang('landing.feat1_title_1') <br /><span class="text-brand-slate dark:text-slate-300">@lang('landing.feat1_title_2')</span></h2>
                    <p class="text-brand-slate dark:text-slate-300 text-lg font-light leading-relaxed mb-8">
                        @lang('landing.feat1_desc')
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-brand-dark dark:text-white font-medium"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.feat1_list_1')</li>
                        <li class="flex items-center gap-3 text-brand-dark dark:text-white font-medium"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.feat1_list_2')</li>
                    </ul>
                </div>
                <div class="w-full lg:w-1/2 showcase-img">
                    <div class="rounded-3xl overflow-hidden border border-brand-teal/20 dark:border-brand-teal/30 shadow-2xl dark:shadow-none">
                        <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?q=80&w=1000&auto=format&fit=crop"
                            alt="Kanban Feature" class="w-full h-auto">
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-16 showcase-row">
                <div class="w-full lg:w-1/2 showcase-text">
                    <h2 class="font-outfit text-4xl lg:text-5xl font-medium text-brand-dark dark:text-white mb-6 leading-tight">
                        @lang('landing.feat2_title_1') <br /><span class="text-brand-slate dark:text-slate-300">@lang('landing.feat2_title_2')</span></h2>
                    <p class="text-brand-slate dark:text-slate-300 text-lg font-light leading-relaxed mb-8">
                        @lang('landing.feat2_desc')
                    </p>
                    <a href="{{ route('register') }}"
                        class="text-brand-orange font-semibold hover:text-brand-brown transition-colors flex items-center gap-1">
                        @lang('landing.feat2_btn') <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
                <div class="w-full lg:w-1/2 showcase-img">
                    <div class="rounded-3xl overflow-hidden border border-brand-teal/20 dark:border-brand-teal/30 shadow-2xl dark:shadow-none relative">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1000&auto=format&fit=crop"
                            alt="Team Collaboration" class="w-full h-auto">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. Bento Grid Deep Features -->
    <section class="py-32 bg-white dark:bg-slate-800 border-t border-brand-teal/10 dark:border-brand-teal/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20 bento-header gsap-hidden">
                <h2 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark dark:text-white mb-6">@lang('landing.bento_header')</h2>
                <p class="text-brand-slate dark:text-slate-300 text-xl font-light max-w-2xl mx-auto">@lang('landing.bento_desc')</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[320px]">
                <!-- Large Card -->
                <div
                    class="md:col-span-2 bg-brand-surface dark:bg-slate-900 rounded-[32px] p-10 border border-brand-teal/10 dark:border-brand-teal/20 hover:border-brand-teal/30 transition-colors flex flex-col justify-between relative overflow-hidden bento-item gsap-hidden">
                    <div>
                        <div
                            class="w-10 h-10 rounded-full bg-white dark:bg-slate-800 flex items-center justify-center mb-6 shadow-sm dark:shadow-none border border-brand-teal/10 dark:border-brand-teal/20">
                            <svg class="w-5 h-5 text-brand-slate dark:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-3">@lang('landing.bento_1_title')</h3>
                        <p class="text-brand-slate dark:text-slate-300 font-light">@lang('landing.bento_1_desc')</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=800&auto=format&fit=crop"
                        class="w-full h-32 object-cover rounded-xl mt-4 opacity-80 mix-blend-multiply dark:opacity-100 dark:mix-blend-normal" alt="Workspaces">
                </div>

                <!-- Small Card -->
                <div class="bg-brand-dark rounded-[32px] p-10 flex flex-col justify-between bento-item gsap-hidden">
                    <div>
                        <div class="w-10 h-10 rounded-full bg-brand-slate flex items-center justify-center mb-6">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit text-2xl font-medium text-white mb-3">@lang('landing.bento_2_title')</h3>
                        <p class="text-brand-surface/70 font-light text-sm">@lang('landing.bento_2_desc')</p>
                    </div>
                </div>

                <!-- Small Card AI -->
                <div
                    class="md:col-span-3 lg:col-span-1 bg-gradient-to-br from-brand-orange to-[#ff9838] rounded-[32px] p-10 flex flex-col justify-between relative overflow-hidden bento-item gsap-hidden">
                    <div class="relative z-10">
                        <div
                            class="inline-block px-3 py-1 bg-white/20 text-white text-xs font-bold rounded-full backdrop-blur-md mb-6">
                            @lang('landing.bento_3_badge')</div>
                        <h3 class="font-outfit text-2xl font-medium text-white mb-3">@lang('landing.bento_3_title')</h3>
                        <p class="text-white/90 font-light">@lang('landing.bento_3_desc')</p>
                    </div>
                </div>

                <!-- Medium Card -->
                <div
                    class="md:col-span-3 lg:col-span-2 bg-brand-surface dark:bg-slate-900 rounded-[32px] p-10 border border-brand-teal/10 dark:border-brand-teal/20 flex flex-col justify-center items-center text-center bento-item gsap-hidden">
                    <h3 class="font-outfit text-3xl font-medium text-brand-dark dark:text-white mb-4">@lang('landing.bento_4_title')</h3>
                    <p class="text-brand-slate dark:text-slate-300 font-light max-w-md">@lang('landing.bento_4_desc')</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Pricing Section -->
    <section id="pricing" class="py-32 bg-brand-surface dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-outfit text-4xl md:text-5xl font-medium text-brand-dark dark:text-white mb-6">@lang('landing.pricing_header')</h2>
                <p class="text-brand-slate dark:text-slate-300 text-xl font-light">@lang('landing.pricing_desc')</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Free Plan -->
                <div class="bg-white dark:bg-slate-800 rounded-[32px] p-10 border border-brand-teal/10 dark:border-brand-teal/20 shadow-lg pricing-card gsap-hidden">
                    <h3 class="font-outfit text-2xl font-medium text-brand-dark dark:text-white mb-2">@lang('landing.pricing_free')</h3>
                    <p class="text-brand-slate dark:text-slate-300 font-light text-sm mb-6">@lang('landing.pricing_free_desc')</p>
                    <div class="mb-8">
                        <span class="font-outfit text-5xl font-bold text-brand-dark dark:text-white">@lang('landing.pricing_free_price')</span>
                        <span class="text-brand-slate dark:text-slate-300">@lang('landing.pricing_free_period')</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-brand-slate dark:text-slate-300 font-light"><svg class="w-5 h-5 text-brand-teal"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_free_l1')</li>
                        <li class="flex items-center gap-3 text-brand-slate dark:text-slate-300 font-light"><svg class="w-5 h-5 text-brand-teal"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_free_l2')</li>
                        <li class="flex items-center gap-3 text-brand-slate dark:text-slate-300 font-light"><svg class="w-5 h-5 text-brand-teal"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_free_l3')</li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full py-4 text-center rounded-full font-medium bg-brand-surface dark:bg-slate-900 text-brand-dark dark:text-white hover:bg-brand-teal/10 transition-colors">
                        @lang('landing.pricing_free_btn')
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-brand-dark rounded-[32px] p-10 shadow-2xl dark:shadow-none relative overflow-hidden pricing-card gsap-hidden">
                    <div
                        class="absolute top-0 right-0 px-4 py-1 bg-brand-orange text-white text-xs font-bold rounded-bl-xl">
                        @lang('landing.pricing_pro_badge')</div>
                    <h3 class="font-outfit text-2xl font-medium text-white mb-2">@lang('landing.pricing_pro')</h3>
                    <p class="text-brand-surface/70 font-light text-sm mb-6">@lang('landing.pricing_pro_desc')</p>
                    <div class="mb-8">
                        <span class="font-outfit text-5xl font-bold text-white">@lang('landing.pricing_pro_price')</span>
                        <span class="text-brand-surface/70">@lang('landing.pricing_pro_period')</span>
                    </div>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_pro_l1')</li>
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_pro_l2')</li>
                        <li class="flex items-center gap-3 text-brand-surface/90 font-light"><svg
                                class="w-5 h-5 text-brand-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> @lang('landing.pricing_pro_l3')</li>
                    </ul>
                    <a href="{{ route('register') }}"
                        class="block w-full py-4 text-center rounded-full font-medium bg-brand-orange text-white hover:bg-orange-600 transition-colors">
                        @lang('landing.pricing_pro_btn')
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection