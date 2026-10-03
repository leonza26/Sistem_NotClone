<div x-data="pwaInstall()" 
     x-show="showBanner" 
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-8 scale-95"
     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
     x-transition:leave-end="opacity-0 translate-y-8 scale-95"
     class="fixed bottom-20 md:bottom-6 left-4 right-4 md:left-auto md:right-6 md:w-96 z-[70] bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl border border-brand-teal/20 dark:border-brand-teal/30 rounded-2xl p-4 shadow-[0_12px_40px_-10px_rgba(40,43,42,0.2)] dark:shadow-none"
     style="display: none;">
    <div class="flex items-start gap-3">
        <img src="{{ asset('img/Logo_Flowral.png') }}" alt="Flowral Logo" class="w-10 h-10 object-contain rounded-xl shrink-0 p-1 bg-brand-surface dark:bg-slate-700 border border-brand-teal/10">
        
        <div class="flex-1 min-w-0 pt-0.5">
            <h4 class="text-sm font-outfit font-semibold text-brand-dark dark:text-white leading-tight">
                Install Flowral App
            </h4>
            <p class="text-xs text-brand-slate/70 dark:text-slate-300 mt-1 leading-relaxed">
                Pasang di layar utama ponsel untuk akses instan dan mode layar penuh.
            </p>
            
            <div class="flex items-center gap-2 mt-3">
                <button @click="installApp()" 
                        class="px-4 py-2 bg-brand-orange text-white text-xs font-semibold rounded-xl shadow-md hover:bg-brand-orange/90 active:scale-95 transition-all flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">download</span>
                    Pasang Sekarang
                </button>
                <button @click="dismissBanner()" 
                        class="px-3 py-2 text-xs font-medium text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-white transition-colors">
                    Nanti Saja
                </button>
            </div>
        </div>

        <button @click="dismissBanner()" 
                class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors shrink-0 p-1">
            <span class="material-symbols-outlined text-[18px]">close</span>
        </button>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('pwaInstall', () => ({
            deferredPrompt: null,
            showBanner: false,

            init() {
                // Register Service Worker
                if ('serviceWorker' in navigator) {
                    navigator.serviceWorker.register('/sw.js').catch(err => {
                        console.error('Service Worker registration failed:', err);
                    });
                }

                // Jangan tampilkan jika sudah di-dismiss dalam 7 hari terakhir
                const dismissedTime = localStorage.getItem('flowral_pwa_dismissed');
                if (dismissedTime && (Date.now() - parseInt(dismissedTime)) < 7 * 24 * 60 * 60 * 1000) {
                    return;
                }

                // Tangkap event instalasi browser
                window.addEventListener('beforeinstallprompt', (e) => {
                    e.preventDefault();
                    this.deferredPrompt = e;
                    this.showBanner = true;
                });

                // Deteksi jika aplikasi sudah terinstall (mode standalone)
                window.addEventListener('appinstalled', () => {
                    this.showBanner = false;
                    this.deferredPrompt = null;
                });

                if (window.matchMedia('(display-mode: standalone)').matches) {
                    this.showBanner = false;
                }
            },

            async installApp() {
                if (this.deferredPrompt) {
                    this.deferredPrompt.prompt();
                    const { outcome } = await this.deferredPrompt.userChoice;
                    if (outcome === 'accepted') {
                        this.showBanner = false;
                    }
                    this.deferredPrompt = null;
                } else {
                    // Fallback instruksi untuk browser yang tidak mendukung programmatic prompt (misal iOS Safari)
                    alert('Untuk memasang di iPhone/iPad: Ketuk ikon "Bagikan (Share)" di Safari, lalu pilih "Tambah ke Layar Utama (Add to Home Screen)".');
                    this.dismissBanner();
                }
            },

            dismissBanner() {
                this.showBanner = false;
                localStorage.setItem('flowral_pwa_dismissed', Date.now().toString());
            }
        }));
    });
</script>
