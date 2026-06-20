@extends('layouts.member')

@section('title', 'Workspace')

@section('content')

    <div class="px-10 pb-12">
        <header class="max-w-6xl flex justify-between items-center mb-8">
            <div>
                <div
                    class="flex items-center gap-2 text-on-surface-variant text-[11px] font-semibold uppercase tracking-wider mb-2">
                    <span>Member</span>
                    <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                    <span class="text-primary font-bold">Workspaces</span>
                </div>
                <h2
                    class="font-headline text-display-md text-4xl font-extrabold text-on-surface leading-tight tracking-tight">
                    My <span class="text-primary">Workspaces.</span>
                </h2>
            </div>
            <a href="{{ route('member.workspace.create') }}"
                class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-xl shadow-md hover:shadow-lg transition">
                + New Workspace
            </a>
        </header>
        <div class="max-w-6xl mt-8">
            @if (session('success'))
                <div class="mb-6 px-4 py-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($workspaces as $workspace)
                    <div
                        class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] relative overflow-hidden group border border-outline-variant hover:border-primary transition-colors">
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold text-on-surface mb-1">{{ $workspace->name }}</h3>
                            <p class="text-xs text-on-surface-variant mb-6">Owner: {{ $workspace->owner->name }}</p>

                            <div class="flex justify-end gap-3 pt-4 border-t border-outline-variant">
                                <a href="{{ route('member.workspace.edit', $workspace) }}"
                                    class="text-sm font-bold text-primary hover:underline">Edit</a>
                                    {{-- alpine js --}}
                                <button type="button" x-data=""
                                    @click="$dispatch('open-delete-modal', { url: '{{ route('member.workspace.destroy', $workspace) }}', message: 'Yakin ingin menghapus workspace {{ $workspace->name }} beserta seluruh isinya?' })"
                                    class="text-sm font-bold text-error hover:underline">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-3 bg-surface-container-lowest p-10 rounded-xl shadow-sm border border-dashed border-outline text-center">
                        <span class="material-symbols-outlined text-4xl text-outline mb-2"
                            data-icon="folder_off">folder_off</span>
                        <h3 class="text-lg font-bold text-on-surface">No Workspace Found</h3>
                        <p class="mt-1 text-sm text-on-surface-variant mb-6">Start your journey by creating a new workspace.
                        </p>
                        <a href="{{ route('member.workspace.create') }}"
                            class="px-5 py-2.5 bg-primary text-on-primary font-bold rounded-xl shadow hover:shadow-md transition">
                            Create Workspace
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
