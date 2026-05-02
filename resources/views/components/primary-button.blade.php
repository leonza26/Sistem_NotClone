<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-3 px-6 primary-gradient text-white font-headline font-bold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all shadow-lg shadow-primary/20']) }}>
    {{ $slot }}
</button>
