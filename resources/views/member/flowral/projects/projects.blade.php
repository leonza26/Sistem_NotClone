<!-- Page Content -->
@extends('layouts.member')

@section('title', 'Projects')

@section('content')
    <div class="px-10 pb-12 max-w-7xl">
        <!-- Breadcrumbs & Title -->
        <div class="mb-12">
            <nav class="flex items-center gap-2 text-on-surface-variant mb-4">
                <span class="text-xs font-medium tracking-wide uppercase">Workspace</span>
                <span class="w-1 h-1 rounded-full bg-primary-container"></span>
                <span class="text-xs font-medium tracking-wide uppercase text-on-surface">Active Projects</span>
            </nav>
            <div class="flex justify-between items-end">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight text-on-surface mb-2">
                        Project Portfolio
                    </h1>
                    <p class="text-on-surface-variant max-w-md">
                        Mengelola {{ $projects->count() }} project aktif Anda dari seluruh workspace.
                    </p>
                </div>
                <a href="{{ route('member.projects.create') }}"
                    class="signature-gradient text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Create Project
                </a>
            </div>
        </div>
        @if (session('success'))
            <div class="mb-8 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-sm font-medium">
                {{ session('success') }}
            </div>
        @endif
        <!-- Bento-Style Projects Grid -->
        <div class="grid grid-cols-12 gap-6">
            @forelse ($projects as $project)
                @if ($loop->first)
                    <!-- Primary Featured Project (Ukuran Besar - Span 8) -->
                    <div
                        class="col-span-12 lg:col-span-8 bg-surface-container-lowest rounded-2xl p-8 relative overflow-hidden group border border-outline-variant hover:border-primary transition-all shadow-sm hover:shadow-md">
                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-12">
                                <div>
                                    <span
                                        class="bg-primary-container/20 text-primary px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase mb-3 inline-block">
                                        {{ $project->workspace->name }}
                                    </span>
                                    <h3 class="text-3xl font-bold text-on-surface leading-tight mb-3">
                                        {{ $project->name }}
                                    </h3>
                                    <p class="text-on-surface-variant max-w-sm line-clamp-2">
                                        {{ $project->description ?: 'Belum ada deskripsi untuk project ini.' }}
                                    </p>
                                </div>
                                <div class="flex gap-2 relative z-20">
                                    <a href="{{ route('member.projects.edit', $project) }}"
                                        class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-primary hover:bg-primary-container transition shadow-sm">
                                        <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                                    </a>
                                    <!-- Tombol Panggil Modal Hapus -->
                                    <button type="button" x-data=""
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('member.projects.destroy', $project) }}', message: 'Yakin ingin menghapus project {{ $project->name }}? Seluruh data di dalamnya tidak bisa dikembalikan.' })"
                                        class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-red-600 hover:bg-red-100 transition shadow-sm">
                                        <span class="material-symbols-outlined text-[18px]" data-icon="delete">delete</span>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-auto flex justify-between items-end">
                                <div class="text-sm font-bold text-on-surface-variant">
                                    Dibuat: {{ $project->created_at->format('d M Y') }}
                                </div>
                                <span
                                    class="material-symbols-outlined text-primary group-hover:translate-x-1 transition-transform"
                                    data-icon="arrow_forward">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Secondary Projects (Ukuran Kecil - Span 4) -->
                    <div
                        class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-lowest rounded-2xl p-6 transition-all hover:border-primary hover:shadow-md border border-outline-variant shadow-sm relative group flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-6">
                                <span
                                    class="bg-tertiary-container/20 text-tertiary px-3 py-1 rounded-full text-[0.6875rem] font-bold tracking-wider uppercase inline-block">
                                    {{ $project->workspace->name }}
                                </span>
                                <!-- Aksi Edit/Delete (Muncul saat Hover) -->
                                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('member.projects.edit', $project) }}"
                                        class="text-slate-400 hover:text-primary transition">
                                        <span class="material-symbols-outlined text-[20px]" data-icon="edit">edit</span>
                                    </a>
                                    <!-- Tombol Panggil Modal Hapus -->
                                    <button type="button" x-data=""
                                        @click="$dispatch('open-delete-modal', { url: '{{ route('member.projects.destroy', $project) }}', message: 'Yakin ingin menghapus project {{ $project->name }} beserta seluruh isinya?' })"
                                        class="text-slate-400 hover:text-red-600 transition">
                                        <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                                    </button>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-on-surface mb-2">
                                {{ $project->name }}
                            </h3>
                            <p class="text-sm text-on-surface-variant line-clamp-2">
                                {{ $project->description ?: 'Belum ada deskripsi untuk project ini.' }}
                            </p>
                        </div>
                        <div class="mt-8 flex justify-between items-center border-t border-surface-container pt-4">
                            <span
                                class="text-xs font-bold text-on-surface-variant">{{ $project->created_at->diffForHumans() }}</span>
                            <span
                                class="material-symbols-outlined text-primary text-[18px] group-hover:translate-x-1 transition-transform"
                                data-icon="arrow_forward">arrow_forward</span>
                        </div>
                    </div>
                @endif
            @empty
                <!-- Saat Data Kosong -->
                <div
                    class="col-span-12 bg-surface-container-lowest p-10 rounded-2xl shadow-sm border border-dashed border-outline text-center flex flex-col items-center justify-center">
                    <span class="material-symbols-outlined text-5xl text-outline mb-4"
                        data-icon="folder_off">folder_off</span>
                    <h3 class="text-xl font-bold text-on-surface">Belum Ada Project</h3>
                    <p class="mt-2 text-sm text-on-surface-variant mb-6 max-w-md">Anda belum memiliki project. Mulailah
                        mengelola pekerjaan tim Anda dengan membuat project pertama.</p>
                </div>
            @endforelse
            <!-- Create New Card (Selalu muncul di akhir Grid) -->
            <a href="{{ route('member.projects.create') }}"
                class="col-span-12 md:col-span-6 lg:col-span-4 bg-primary text-white rounded-2xl p-8 cursor-pointer group flex flex-col justify-center items-center text-center shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
                <div
                    class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[32px]" data-icon="add_circle">add_circle</span>
                </div>
                <h3 class="text-xl font-bold mb-2">Project Baru</h3>
                <p class="text-white/80 text-sm">Tambahkan project baru ke dalam workspace Anda.</p>
            </a>
        </div>
    </div>
@endsection
