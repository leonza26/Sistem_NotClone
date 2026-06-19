@extends('layouts.member')

@section('title', 'AI Assistant')

@section('content')
    <header
        class="sticky top-0 z-40 flex justify-between items-center h-16 w-full px-8 bg-white/70 dark:bg-slate-950/70 backdrop-blur-xl"
        style="box-shadow: 0 20px 40px -10px rgba(40, 43, 42, 0.06)">
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2 text-on-surface-variant font-medium text-sm">
                <span>Workspaces</span>
                <span class="w-1 h-1 rounded-full bg-primary-container"></span>
                <span class="text-teal-700 dark:text-teal-400 font-bold">AI Assistant</span>
            </div>
            <div
                class="flex items-center bg-surface-container rounded-full px-4 py-1.5 gap-2 w-64 group focus-within:ring-1 focus-within:ring-primary/20 transition-all">
                <span class="material-symbols-outlined text-outline text-sm" data-icon="search">search</span>
                <input class="bg-transparent border-none text-xs focus:ring-0 w-full placeholder:text-outline"
                    placeholder="Search insights..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined text-secondary" data-icon="notifications">notifications</span>
            </button>
            <button
                class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined text-secondary" data-icon="history">history</span>
            </button>
            <div class="w-8 h-8 rounded-full overflow-hidden bg-secondary-container ring-2 ring-surface">
                <img alt="User Avatar"
                    data-alt="professional portrait of a creative director in a minimalist studio setting with soft natural lighting"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA-61w8ULmFGhroTvN9so9q90vBx173zGWDDUl1VXilGsTqJMcKqLnQuM-3WtPG_KkijSF937cNH9UypkJTpxrUCz59Bwezkt02DadIlK57vR5VsMEFA0d61S3NKZoql8zquvltlYLiYsq2b9Knb6IeE1A8Mek8WDEIsdLvKfAV_HIDon46DeSVwHAycMZTtq_4SelL2-BW56fqzFQMK3o1ok2ekOdDj3rHyqVTGK2vMYzERhovZJp5x4r_tonn9iyGYQaAY3hvSg" />
            </div>
        </div>
    </header>
@endsection
