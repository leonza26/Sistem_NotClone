<!-- Page Content -->
@extends('layouts.member')

@section('title', 'Create Projects')

@section('content')
    <div class="px-10 pb-12">
        <header class="max-w-3xl mb-8">
            <div
                class="flex items-center gap-2 text-on-surface-variant text-[11px] font-semibold uppercase tracking-wider mb-2">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <a href="{{ route('member.projects') }}" class="hover:text-primary transition-colors">Projects</a>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span class="text-primary font-bold">Create</span>
            </div>
            <h2 class="font-headline text-display-md text-4xl font-extrabold text-on-surface leading-tight tracking-tight">
                Create <span class="text-primary">Project.</span>
            </h2>
            <p class="text-on-surface-variant mt-2 text-sm">Tambahkan project baru dan hubungkan ke workspace Anda.</p>
        </header>
        <div class="max-w-3xl mt-8">
            <div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant">
                <form action="{{ route('member.projects.store') }}" method="POST">
                    @csrf

                    <!-- Pilih Workspace -->
                    <div class="mb-6">
                        <label for="workspace_id" class="block text-sm font-bold text-on-surface mb-2">Pilih
                            Workspace</label>
                        <select name="workspace_id" id="workspace_id"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                            required>
                            <option value="" disabled selected>-- Pilih Workspace --</option>
                            @foreach ($workspaces as $workspace)
                                <option value="{{ $workspace->id }}"
                                    {{ old('workspace_id') == $workspace->id ? 'selected' : '' }}>
                                    {{ $workspace->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('workspace_id')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Nama Project -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-bold text-on-surface mb-2">Project Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                            required placeholder="e.g. Website Revamp, Marketing Q3...">
                        @error('name')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Deskripsi Project -->
                    <div class="mb-8">
                        <label for="description" class="block text-sm font-bold text-on-surface mb-2">Description
                            (Opsional)</label>
                        <textarea name="description" id="description" rows="4"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                            placeholder="Tuliskan detail atau tujuan singkat project ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-outline-variant">
                        <a href="{{ route('member.projects') }}"
                            class="px-5 py-2.5 text-sm font-bold text-on-surface bg-surface-container rounded-xl hover:bg-surface-container-high transition">Batal</a>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-bold text-on-primary bg-primary rounded-xl shadow-md hover:shadow-lg transition">Simpan
                            Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
