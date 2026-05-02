<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full editorial-gradient text-on-primary font-headline font-bold py-4 rounded-xl shadow-lg hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2 group']) }}>
    {{ $slot }}
</button>
