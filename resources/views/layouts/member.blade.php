<!doctype html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'member')</title>
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    @include('components.member.sidebar')
    <!-- TopNavBar Anchor -->
    @include('components.member.header')
    <!-- Main Content Canvas -->
    <main class="ml-64 pt-24 min-h-screen">
        @yield('content')
    </main>

    <!-- Floating Action Button (FAB) -->
    <button
        class="fixed bottom-10 right-10 w-16 h-16 rounded-full signature-gradient text-white flex items-center justify-center shadow-[0_20px_40px_-10px_rgba(49,101,116,0.4)] hover:scale-110 transition-transform z-50">
        <span class="material-symbols-outlined text-3xl" data-icon="add">add</span>
    </button>

    <!-- Global Delete Confirmation Modal (Alpine.js) -->
    <div x-data="{ open: false, url: '', message: '' }"
        @open-delete-modal.window="open = true; url = $event.detail.url; message = $event.detail.message;"
        class="fixed inset-0 z-[100] flex items-center justify-center" x-show="open" x-cloak style="display: none;">

        <!-- Backdrop -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="open = false"></div>

        <!-- Modal Panel -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative bg-surface-container-lowest border border-outline-variant rounded-3xl shadow-2xl w-full max-w-md p-8">

            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-red-600 text-3xl"
                    data-icon="delete_forever">delete_forever</span>
            </div>
            <h3 class="text-2xl font-headline font-bold text-on-surface mb-2">Konfirmasi Hapus</h3>

            <!-- Pesan akan di-bind ke variabel Alpine -->
            <p class="text-on-surface-variant text-sm mb-8 line-clamp-3" x-text="message"></p>

            <div class="flex gap-3 justify-end mt-4 pt-6 border-t border-outline-variant">
                <button @click="open = false" type="button"
                    class="px-5 py-2.5 rounded-xl text-on-surface font-bold hover:bg-surface-container transition-colors">Batal</button>

                <!-- Action Form akan di-bind ke variabel url Alpine -->
                <form method="POST" :action="url">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-error text-on-error font-bold shadow-lg shadow-error/20 hover:opacity-90 active:scale-95 transition-all">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
