@extends('layouts.member')

@section('title', 'Projects')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-7xl">
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <div
                    class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                    <span>Workspace</span>
                    <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                    <span class="text-brand-orange font-bold">Active Projects</span>
                </div>
                <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                    Project <span class="text-brand-orange">Portfolio.</span>
                </h2>
                <p class="text-brand-slate font-light mt-1">Mengelola {{ $projects->count() }} project aktif Anda dari
                    seluruh workspace.</p>
            </div>
            <a href="{{ route('member.projects.create') }}"
                class="px-5 py-2.5 bg-brand-orange text-white text-sm font-medium rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-2 w-fit">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Create Project
            </a>
        </header>


        <div class="grid grid-cols-12 gap-6">
            @forelse ($projects as $project)
                @if ($loop->first)
                    <!-- Primary Featured Project (Lebih Besar - Span 8) -->
                    <div
                        class="col-span-12 lg:col-span-8 bg-brand-dark rounded-[32px] p-8 sm:p-10 relative overflow-hidden group shadow-[0_10px_30px_-15px_rgba(40,43,42,0.5)] flex flex-col h-full">
                        <!-- Efek Glow Oranye -->
                        <div
                            class="absolute -top-10 -right-10 w-64 h-64 bg-brand-orange/20 blur-[60px] rounded-full group-hover:bg-brand-orange/30 transition-colors">
                        </div>

                        <div class="relative z-10 flex-grow">
                            <div class="flex justify-between items-start mb-10">
                                <div>
                                    <span
                                        class="bg-white/10 border border-white/20 text-white px-3 py-1 rounded-md text-[10px] font-bold tracking-widest uppercase mb-4 inline-block">
                                        {{ $project->workspace->name }}
                                    </span>
                                    <h3 class="font-outfit text-3xl sm:text-4xl font-medium text-white leading-tight mb-3">
                                        {{ $project->name }}
                                    </h3>
                                    <p class="text-white/60 font-light max-w-md line-clamp-2 text-[13px] leading-relaxed">
                                        {{ $project->description ?: 'Belum ada deskripsi untuk project ini.' }}
                                    </p>
                                </div>
                                <!-- Aksi -->
                                <div class="flex gap-2">
                                    <a href="{{ route('member.projects.edit', $project) }}"
                                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 flex items-center justify-center text-white transition-all backdrop-blur-md"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <button type="button" x-data=""
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('member.projects.destroy', $project) }}', message: 'Yakin ingin menghapus project {{ $project->name }}? Seluruh data di dalamnya tidak bisa dikembalikan.' })"
                                        class="w-10 h-10 rounded-xl bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 flex items-center justify-center text-red-400 transition-all backdrop-blur-md"
                                        title="Delete">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 mt-auto flex justify-between items-end border-t border-white/10 pt-5">
                            <div class="text-[11px] font-medium text-white/50 tracking-widest uppercase">
                                Created • {{ $project->created_at->format('M d, Y') }}
                            </div>
                            <span
                                class="material-symbols-outlined text-brand-orange group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                @else
                    <!-- Secondary Projects (Lebih Kecil - Span 4) -->
                    <div
                        class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-[24px] p-6 sm:p-8 border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] hover:shadow-[0_8px_30px_-10px_rgba(48,71,78,0.1)] hover:border-brand-teal/30 transition-all relative group flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex justify-between items-start mb-6">
                                <span
                                    class="bg-brand-surface text-brand-teal border border-brand-teal/20 px-2.5 py-1 rounded-md text-[9px] font-bold tracking-widest uppercase inline-block">
                                    {{ $project->workspace->name }}
                                </span>
                                <!-- Aksi (Muncu saat Hover) -->
                                <div class="flex gap-1.5 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('member.projects.edit', $project) }}"
                                        class="text-brand-slate hover:text-brand-orange transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <button type="button" x-data=""
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('member.projects.destroy', $project) }}', message: 'Yakin ingin menghapus project {{ $project->name }}?' })"
                                        class="text-brand-slate hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                            <h3 class="font-outfit text-xl font-medium text-brand-dark mb-1">{{ $project->name }}</h3>
                            <p class="text-[13px] font-light text-brand-slate line-clamp-2 leading-relaxed">
                                {{ $project->description ?: 'Belum ada deskripsi untuk project ini.' }}
                            </p>
                        </div>

                        <div class="mt-8 flex justify-between items-center border-t border-brand-teal/10 pt-4">
                            <span
                                class="text-[11px] font-medium text-brand-slate/60 tracking-widest uppercase">{{ $project->created_at->diffForHumans() }}</span>
                            <span
                                class="material-symbols-outlined text-brand-slate group-hover:text-brand-orange group-hover:translate-x-1 transition-all text-[18px]">arrow_forward</span>
                        </div>
                    </div>
                @endif
            @empty
                <!-- State Kosong -->
                <div
                    class="col-span-12 bg-white p-12 rounded-[32px] border border-dashed border-brand-teal/20 text-center flex flex-col items-center justify-center h-64">
                    <div class="w-16 h-16 rounded-full bg-brand-surface flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-brand-slate text-[32px]">folder_off</span>
                    </div>
                    <h3 class="font-outfit text-xl font-medium text-brand-dark mb-2">No Projects Found</h3>
                    <p class="text-sm font-light text-brand-slate mb-6 max-w-sm mx-auto">Start your architectural journey by
                        creating a new project inside your workspace.</p>
                </div>
            @endforelse

            <!-- Tombol Tambah "Kotak Orange" (Selalu di akhir grid) -->
            <a href="{{ route('member.projects.create') }}"
                class="col-span-12 md:col-span-6 lg:col-span-4 bg-gradient-to-br from-brand-orange to-[#ff9838] text-white rounded-[24px] p-8 cursor-pointer group flex flex-col justify-center items-center text-center shadow-[0_10px_30px_-15px_rgba(229,117,0,0.5)] hover:shadow-xl transition-all hover:-translate-y-1 h-full min-h-[200px]">
                <div
                    class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm border border-white/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[28px]">add</span>
                </div>
                <h3 class="font-outfit text-xl font-medium mb-1">New Project</h3>
                <p class="text-white/80 text-[13px] font-light px-4">Add a new project to your workflow.</p>
            </a>
        </div>
    </div>
@endsection
