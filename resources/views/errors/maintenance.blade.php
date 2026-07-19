<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Upgrade | Flowral</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
        }

        .glass-panel {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 overflow-hidden relative">

    <!-- Efek Cahaya Estetik (Glowing Orbs) -->
    <div
        class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-500/20 rounded-full blur-[100px] pointer-events-none">
    </div>
    <div
        class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-teal-500/10 rounded-full blur-[100px] pointer-events-none">
    </div>

    <div class="max-w-lg w-full text-center relative z-10">

        <!-- Logo Sederhana -->
        <div class="flex items-center justify-center gap-2 mb-8 opacity-80">
            <div class="w-8 h-8 bg-white text-slate-900 rounded-lg flex items-center justify-center font-bold text-xl">F
            </div>
            <span class="text-xl font-bold tracking-wide">Flowral<span class="text-teal-400">.</span></span>
        </div>

        <!-- Panel Kaca -->
        <div class="glass-panel p-10 rounded-3xl shadow-2xl">
            <!-- Ikon Animasi Gigi Roda -->
            <div class="relative w-20 h-20 mx-auto mb-6">
                <div class="absolute inset-0 bg-red-500/20 rounded-full animate-ping"></div>
                <div
                    class="relative w-20 h-20 bg-slate-800 border border-slate-700 text-red-400 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                    </svg>
                </div>
            </div>

            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-3">System Upgrade</h1>
            <p class="text-slate-400 text-sm leading-relaxed mb-6">
                We are currently upgrading our core infrastructure to bring you a faster and more secure experience.
                Flowral will be back online shortly.
            </p>

            <!-- Status Indicator -->
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900/50 rounded-full border border-slate-700">
                <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                <span class="text-[10px] text-slate-300 font-bold tracking-widest">MAINTENANCE IN PROGRESS</span>
            </div>
        </div>

        <div class="mt-8">
            <p class="text-[10px] text-slate-500 tracking-widest uppercase font-bold">Flowral Core System &copy;
                {{ date('Y') }}</p>
        </div>
    </div>
</body>

</html>