@extends('layouts.member')

@section('title', 'Edit Workspace')

@section('content')

    <div class="px-10 pb-12">
        <header class="max-w-3xl mb-8">
            <div
                class="flex items-center gap-2 text-on-surface-variant text-[11px] font-semibold uppercase tracking-wider mb-2">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <a href="{{ route('member.workspace.index') }}" class="hover:text-primary">Workspaces</a>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span class="text-primary font-bold">Edit</span>
            </div>
            <h2 class="font-headline text-display-md text-4xl font-extrabold text-on-surface leading-tight tracking-tight">
                Edit <span class="text-primary">Workspace.</span>
            </h2>
        </header>
        <div class="max-w-3xl mt-8">
            <div
                class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_20px_40px_-10px_rgba(40,43,42,0.06)] border border-outline-variant">
                <form action="{{ route('member.workspace.update', $workspace) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-bold text-on-surface mb-2">Workspace Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $workspace->name) }}"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                            required>
                        @error('name')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-outline-variant mt-8">
                        <a href="{{ route('member.workspace.index') }}"
                            class="px-5 py-2.5 text-sm font-bold text-on-surface bg-surface-container rounded-xl hover:bg-surface-container-high transition">Cancel</a>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-bold text-on-primary bg-primary rounded-xl shadow-md hover:shadow-lg transition">Update
                            Workspace</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
