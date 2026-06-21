<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard') | Flowral</title>

    <!-- PENTING: Link Material Symbols yang tadi tertinggal -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .material-symbols-outlined {
            /* Memastikan font icon ter-render dengan benar */
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            font-variation-settings: "FILL" 0, "wght" 300, "GRAD" 0, "opsz" 24;
            vertical-align: middle;
        }

        /* Custom Scrollbar Minimalis */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #c0c8cb;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #81B4C5;
        }
    </style>
</head>

<body
    class="bg-brand-surface font-inter text-brand-dark overflow-x-hidden selection:bg-brand-orange selection:text-white">
    <!-- SideNavBar -->
    @include('components.member.sidebar')

    <!-- TopNavBar -->
    @include('components.member.header')

    <!-- Main Content -->
    <main class="ml-64 pt-20 min-h-screen">
        @yield('content')
    </main>

    <!-- Global Delete Modal (Alpine.js) -->
    <div x-data="{ open: false, url: '', message: '' }"
        @open-delete-modal.window="open = true; url = $event.detail.url; message = $event.detail.message;"
        class="fixed inset-0 z-[100] flex items-center justify-center" x-show="open" x-cloak style="display: none;">

        <!-- Backdrop -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-brand-dark/40 backdrop-blur-sm" @click="open = false"></div>

        <!-- Modal Panel -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative bg-white border border-brand-teal/20 rounded-3xl shadow-2xl w-full max-w-md p-8">

            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-5 border border-red-100">
                <span class="material-symbols-outlined text-red-500 text-2xl">delete</span>
            </div>
            <h3 class="text-xl font-outfit font-medium text-brand-dark mb-2">Confirm Deletion</h3>

            <!-- Dynamic Message -->
            <p class="text-brand-slate text-sm font-light mb-8 leading-relaxed" x-text="message"></p>

            <div class="flex gap-3 justify-end pt-4">
                <button @click="open = false" type="button"
                    class="px-5 py-2.5 rounded-xl text-brand-slate font-medium text-sm hover:bg-brand-teal/5 transition-colors">Cancel</button>

                <!-- Dynamic Action -->
                <form method="POST" :action="url">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-red-500 text-white font-medium text-sm shadow-lg shadow-red-500/20 hover:bg-red-600 transition-all">
                        Yes, delete it
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
