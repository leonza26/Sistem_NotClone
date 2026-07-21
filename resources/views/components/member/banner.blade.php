@php
    // Cukup 1 baris sakti untuk menarik semua spanduk pengumuman yang statusnya "Aktif"!
    $activeBanners = \App\Models\Banner::where('is_active', true)->get();
@endphp

@if($activeBanners->count() > 0)
    <div class="w-full flex flex-col relative z-[100]">
        @foreach($activeBanners as $banner)
            <div x-data="{ show: true }" x-show="show" x-transition.opacity
                class="relative rounded-md px-4 mb-3 py-2.5 flex items-center justify-between text-white text-sm font-medium shadow-md
                         {{ $banner->type === 'danger' ? 'bg-red-600' : ($banner->type === 'warning' ? 'bg-yellow-600' : 'bg-teal-600') }}">

                <div class="flex-1 text-center flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">campaign</span>
                    <span>{{ $banner->message }}</span>
                </div>

                <!-- Tombol Close menggunakan Alpine.js -->
                <button @click="show = false"
                    class="absolute right-4 p-1 rounded-md hover:bg-white/20 transition-colors focus:outline-none flex items-center justify-center">
                    <span class="material-symbols-outlined text-[16px]">close</span>
                </button>
            </div>
        @endforeach
    </div>
@endif