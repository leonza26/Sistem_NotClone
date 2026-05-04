<!doctype html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Manrope:wght@600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css', 'resources/js/app.js')
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                "FILL" 0,
                "wght" 400,
                "GRAD" 0,
                "opsz" 24;
            vertical-align: middle;
        }

        .glass-panel {
            background: rgba(245, 250, 251, 0.7);
            backdrop-filter: blur(12px);
        }

        .signature-gradient {
            background: linear-gradient(135deg, #316574 0%, #81b4c5 100%);
        }
    </style>
</head>

<body class="bg-surface font-body text-on-surface overflow-x-hidden">
    <!-- SideNavBar Anchor -->
    <x-item.navbar></x-item.navbar>
    <!-- TopNavBar Anchor -->
    <x-item.header></x-item.header>
    <!-- Main Content Canvas -->
    <main class="ml-64 pt-24 min-h-screen">
        <!-- Bento Grid Layout -->
        {{ $slot }}
    </main>

    <!-- Floating Action Button (FAB) -->
    <button
        class="fixed bottom-10 right-10 w-16 h-16 rounded-full signature-gradient text-white flex items-center justify-center shadow-[0_20px_40px_-10px_rgba(49,101,116,0.4)] hover:scale-110 transition-transform z-50">
        <span class="material-symbols-outlined text-3xl" data-icon="add">add</span>
    </button>
</body>

</html>
