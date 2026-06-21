@extends('layouts.member')

@section('title', 'Workspace')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-7xl mx-auto">
        <!-- Header -->
        <header class="flex justify-between items-end mb-10">
            <div>
                <div
                    class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                    <span>Member</span>
                    <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                    <span class="text-brand-orange font-bold">Workspaces</span>
                </div>
                <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                    My <span class="text-brand-orange">Workspaces.</span>
                </h2>
            </div>
            <a href="{{ route('member.workspace.create') }}"
                class="px-5 py-2.5 bg-brand-orange text-white text-sm font-medium rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">add</span>
                New Workspace
            </a>
        </header>

        @if (session('success'))
            <div
                class="mb-8 px-4 py-3 bg-brand-teal/10 border border-brand-teal/20 text-brand-teal rounded-xl text-sm font-medium flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($workspaces as $workspace)
                <!-- Workspace Card -->
                <div
                    class="bg-white p-6 rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] hover:shadow-[0_8px_30px_-10px_rgba(48,71,78,0.1)] hover:border-brand-teal/30 transition-all group flex flex-col h-full">
                    <div class="flex-grow">
                        <div
                            class="w-12 h-12 rounded-xl bg-brand-surface border border-brand-orange flex items-center justify-center mb-4 text-brand-dark">
                            <span class="material-symbols-outlined text-[24px]">architecture</span>
                        </div>
                        <h3 class="font-outfit text-xl font-medium text-brand-dark mb-1">{{ $workspace->name }}</h3>
                        <p class="text-[13px] font-light text-brand-slate mb-6">Owner: <span
                                class="font-medium text-brand-dark">{{ $workspace->owner->name }}</span></p>
                    </div>

                    <div class="flex items-center gap-3 pt-5 border-t border-brand-teal/10 mt-auto">
                        {{-- Tombol Members --}}
                        <a href="{{ route('member.workspace.members.index', $workspace) }}"
                            class="flex-1 py-2 bg-brand-surface text-brand-dark hover:bg-brand-teal/10 hover:text-brand-teal rounded-lg text-xs font-medium transition-colors flex items-center justify-center gap-1.5 border border-transparent hover:border-brand-teal/20">
                            <span class="material-symbols-outlined text-[16px]">group</span>
                            Members
                        </a>

                        {{-- Hanya Owner yang boleh Edit & Delete Workspace --}}
                        @if ($workspace->pivot->role === 'owner')
                            <a href="{{ route('member.workspace.edit', $workspace) }}"
                                class="w-9 h-9 flex items-center justify-center bg-brand-surface text-brand-slate hover:text-brand-orange hover:bg-brand-orange/10 rounded-lg transition-colors border border-transparent hover:border-brand-orange/20"
                                title="Edit">
                                <span class="material-symbols-outlined text-[16px]">edit</span>
                            </a>

                            <button type="button" x-data=""
                                @click="$dispatch('open-delete-modal', { url: '{{ route('member.workspace.destroy', $workspace) }}', message: 'Are you sure you want to delete {{ $workspace->name }} and all of its contents?' })"
                                class="w-9 h-9 flex items-center justify-center bg-brand-surface text-brand-slate hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors border border-transparent hover:border-red-200"
                                title="Delete">
                                <span class="material-symbols-outlined text-[16px]">delete</span>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full bg-white p-12 rounded-[32px] border border-dashed border-brand-teal/20 text-center flex flex-col items-center justify-center h-64">
                    <div class="w-16 h-16 rounded-full bg-brand-surface flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-brand-slate text-[32px]">folder_off</span>
                    </div>
                    <h3 class="font-outfit text-xl font-medium text-brand-dark mb-2">No Workspaces Found</h3>
                    <p class="text-sm font-light text-brand-slate mb-6">Start your architectural journey by creating a new
                        workspace.</p>
                    <a href="{{ route('member.workspace.create') }}"
                        class="px-6 py-2.5 bg-brand-dark text-white text-sm font-medium rounded-xl hover:bg-brand-orange transition-colors">
                        Create First Workspace
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
