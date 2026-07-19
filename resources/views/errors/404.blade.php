<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Flowral</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Mendekati warna teal/emerald Flowral
                        brand: { teal: '#0f766e' }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4 overflow-hidden relative">

    <!-- Ornamen Lingkaran Estetik -->
    <div class="absolute top-[-20%] left-[-10%] w-96 h-96 bg-brand-teal/5 rounded-full blur-3xl pointer-events-none">
    </div>
    <div class="absolute bottom-[-10%] right-[-5%] w-72 h-72 bg-blue-500/5 rounded-full blur-2xl pointer-events-none">
    </div>

    <div class="max-w-md w-full text-center relative z-10 space-y-8">

        <!-- Ilustrasi 404 Elegan -->
        <div class="relative w-48 h-48 mx-auto">
            <!-- Lingkaran Berdenyut -->
            <div class="absolute inset-0 bg-brand-teal/10 rounded-full animate-pulse"></div>
            <div class="absolute inset-4 bg-brand-teal/10 rounded-full"></div>

            <!-- Teks Angka -->
            <div class="relative flex items-center justify-center h-full">
                <span
                    class="text-[100px] font-black text-transparent bg-clip-text bg-gradient-to-br from-slate-700 to-slate-400 drop-shadow-sm leading-none">
                    404
                </span>
            </div>
        </div>

        <!-- Pesan Error -->
        <div>
            <h1 class="text-3xl font-bold text-slate-800 mb-3">Oops! Page not found.</h1>
            <p class="text-slate-500 text-sm leading-relaxed mb-8 px-4">
                The page you are looking for might have been removed, had its name changed, or is temporarily
                unavailable in the Flowral ecosystem.
            </p>

            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium rounded-xl transition-all shadow-md hover:shadow-lg focus:ring-4 focus:ring-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Return to Safety
            </a>
        </div>

        <!-- Footer Kecil -->
        <div class="pt-8 border-t border-slate-200/60">
            <p class="text-xs text-slate-400 font-medium">Flowral Ecosystem &copy; {{ date('Y') }}</p>
        </div>
    </div>
</body>

</html>