<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found — Flowral</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .gsap-hidden { visibility: hidden; opacity: 0; }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, #E57500 0%, #512500 100%);
        }
    </style>
    <!-- Include GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-brand-surface text-brand-dark font-inter antialiased overflow-hidden selection:bg-brand-orange selection:text-white h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="absolute w-full z-50 top-0 bg-transparent">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <div class="w-8 h-8 rounded-full bg-brand-dark flex items-center justify-center">
                    <svg class="w-4 h-4 text-brand-surface" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-outfit font-semibold text-xl tracking-wide text-brand-dark">Flowral.</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative flex-1 flex flex-col items-center justify-center">
        <!-- Glow Orbs -->
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-brand-teal/10 blur-[100px] rounded-full mix-blend-multiply -z-10 animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-brand-orange/5 blur-[100px] rounded-full mix-blend-multiply -z-10" style="animation: pulse 4s infinite alternate;"></div>

        <div class="max-w-3xl mx-auto px-6 text-center z-10">
            <h1 class="hero-anim gsap-hidden font-outfit text-8xl md:text-[150px] font-medium text-brand-dark leading-none tracking-tighter mb-4">
                4<span class="text-gradient">0</span>4
            </h1>
            
            <h2 class="hero-anim gsap-hidden font-outfit text-3xl md:text-5xl font-medium text-brand-dark mb-6">
                Lost in the void.
            </h2>
            
            <p class="hero-anim gsap-hidden text-lg md:text-xl text-brand-slate font-light max-w-xl mx-auto mb-10 leading-relaxed">
                The workspace or page you are looking for doesn't exist, has been moved, or you don't have access to it.
            </p>
            
            <div class="hero-anim gsap-hidden flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ url('/') }}" class="px-8 py-4 text-base font-medium bg-brand-dark text-white rounded-full hover:bg-brand-slate transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.utils.toArray('.gsap-hidden').forEach(el => {
                el.classList.remove('gsap-hidden');
            });

            gsap.fromTo(".hero-anim", {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.15,
                ease: "power3.out"
            });
        });
    </script>
</body>
</html>