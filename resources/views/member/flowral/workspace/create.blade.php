@extends('layouts.member')

@section('title', 'Create Workspace')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-4xl">
        <header class="mb-10">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <a href="{{ route('member.workspace.index') }}" class="hover:text-brand-dark transition-colors">Workspaces</a>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Create</span>
            </div>
            <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                Create <span class="text-brand-orange">Workspace.</span>
            </h2>
        </header>

        <div
            class="bg-white p-8 sm:p-10 rounded-[32px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)]">
            <form action="{{ route('member.workspace.store') }}" method="POST">
                @csrf
                <div class="space-y-1.5 mb-10">
                    <label for="name" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Workspace
                        Name</label>
                    <input type="text" name="name" id="name" required
                        placeholder="e.g. Project Alpha, Design Team..."
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-medium">
                    @error('name')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t border-brand-teal/10">
                    <a href="{{ route('member.workspace.index') }}"
                        class="px-5 py-2.5 text-sm font-medium text-brand-slate bg-brand-surface rounded-xl hover:bg-brand-teal/10 transition-colors">Cancel</a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-brand-orange rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        Save Workspace
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
