<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's New | Flowral</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gsap-hidden { visibility: hidden; opacity: 0; }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, #E57500 0%, #512500 100%);
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F5FAFB; }
        ::-webkit-scrollbar-thumb { background: #81B4C5; border-radius: 4px; }
    </style>
    <!-- Include GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>

<body class="bg-brand-surface text-brand-dark font-inter antialiased overflow-x-hidden selection:bg-brand-orange selection:text-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 top-0 transition-all duration-500 bg-brand-surface/80 backdrop-blur-xl border-b border-brand-teal/10">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-brand-surface" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-outfit font-semibold text-xl tracking-wide text-brand-dark">Flowral.</span>
            </a>
            
            <div class="flex items-center gap-5">
                <a href="{{ url('/') }}" class="font-inter font-medium text-sm text-brand-slate hover:text-brand-dark transition-colors">
                    Back to Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="relative pt-40 pb-20 overflow-hidden flex flex-col items-center justify-center">
        <!-- Glow Orbs -->
        <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-brand-teal/10 blur-[100px] rounded-full mix-blend-multiply -z-10 animate-pulse"></div>
        
        <div class="max-w-3xl mx-auto px-6 text-center z-10">
            <div class="hero-anim gsap-hidden inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-brand-teal/20 text-brand-slate text-[11px] font-semibold tracking-widest uppercase mb-6 shadow-sm">
                <span>Changelog</span>
                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange animate-pulse"></span>
            </div>
            
            <h1 class="hero-anim gsap-hidden font-outfit text-5xl md:text-7xl font-medium text-brand-dark leading-[1.05] tracking-tight mb-6">
                Flowral <span class="text-gradient font-semibold">Updates.</span>
            </h1>
            
            <p class="hero-anim gsap-hidden text-lg text-brand-slate font-light max-w-xl mx-auto leading-relaxed">
                Discover the latest features, bug fixes, and structural improvements in our curated workspace.
            </p>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="pb-32 relative z-10 flex-1">
        <div class="max-w-4xl mx-auto px-6">
            @if(isset($changelogs) && $changelogs->count() > 0)
                <div class="relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-[1px] before:bg-brand-teal/20">

                    @foreach($changelogs as $log)
                        <!-- Timeline Item -->
                        <div class="timeline-item gsap-hidden relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group mb-16 last:mb-0">
                            
                            <!-- Center Dot -->
                            <div class="flex items-center justify-center w-12 h-12 rounded-full border-[6px] border-brand-surface bg-brand-dark shadow-md shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 transition-transform duration-300 group-hover:scale-110">
                                <span class="material-symbols-outlined text-white text-[18px]" style="font-family: 'Material Symbols Outlined';">update</span>
                            </div>
                            
                            <!-- Content Box -->
                            <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] bg-white p-8 rounded-[32px] shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] border border-brand-teal/10 hover:border-brand-teal/30 hover:shadow-lg transition-all duration-300">
                                <div class="flex flex-wrap items-center justify-between mb-6 gap-2">
                                    <span class="text-[11px] font-extrabold text-brand-orange bg-brand-orange/10 px-3 py-1.5 rounded-full tracking-widest uppercase">
                                        {{ $log->version }}
                                    </span>
                                    <time class="text-[10px] text-brand-slate font-bold uppercase tracking-widest">
                                        {{ \Carbon\Carbon::parse($log->released_at)->format('M d, Y') }}
                                    </time>
                                </div>
                                <h3 class="font-outfit text-2xl font-medium text-brand-dark mb-4 leading-tight">
                                    {{ $log->title }}
                                </h3>
                                <div class="text-[14px] text-brand-slate font-light whitespace-pre-wrap leading-relaxed prose prose-slate prose-a:text-brand-orange">
                                    {{ $log->content }}
                                </div>
                            </div>
                            
                        </div>
                    @endforeach

                </div>
            @else
                <div class="hero-anim gsap-hidden text-center p-16 bg-white rounded-[32px] border border-brand-teal/10 shadow-sm">
                    <div class="w-16 h-16 bg-brand-surface rounded-full flex items-center justify-center mx-auto mb-4 text-brand-slate">
                        <span class="material-symbols-outlined text-3xl" style="font-family: 'Material Symbols Outlined';">history</span>
                    </div>
                    <p class="text-brand-slate font-light text-lg">No updates have been published yet.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-brand-teal/10 pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center gap-2 mb-4 md:mb-0 opacity-80">
                <div class="w-6 h-6 rounded bg-brand-dark flex items-center justify-center">
                    <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-outfit font-medium text-lg text-brand-dark">Flowral</span>
            </div>
            <div class="flex gap-8 text-[12px] text-brand-slate font-light">
                <span>&copy; {{ date('Y') }} Flowral. All rights reserved.</span>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Initial Reveals
            gsap.utils.toArray('.gsap-hidden').forEach(el => {
                el.classList.remove('gsap-hidden');
            });

            // Hero Animation
            gsap.fromTo(".hero-anim", {
                y: 30,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.1,
                ease: "power3.out"
            });

            // Timeline Items Scroll Animation
            gsap.utils.toArray('.timeline-item').forEach((item, i) => {
                const direction = i % 2 === 0 ? 50 : -50;
                
                // For mobile, always slide from the right side instead of alternating
                const isMobile = window.innerWidth < 768;
                const startX = isMobile ? 30 : direction;

                gsap.fromTo(item, 
                    { x: startX, opacity: 0 },
                    {
                        x: 0,
                        opacity: 1,
                        duration: 0.8,
                        ease: "power3.out",
                        scrollTrigger: {
                            trigger: item,
                            start: "top 85%",
                            toggleActions: "play none none reverse"
                        }
                    }
                );
            });
        });
    </script>
</body>
</html>