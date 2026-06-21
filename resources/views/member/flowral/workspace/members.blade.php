@extends('layouts.member')

@section('title', 'Workspace Members')

@section('content')

    <div class="px-10 pb-12">
        <header class="max-w-4xl flex justify-between items-center mb-8">
            <div>
                <a href="{{ route('member.workspace.index') }}"
                    class="text-sm text-primary hover:underline mb-2 inline-block">
                    &larr; Back to Workspaces
                </a>
                <h2
                    class="font-headline text-display-sm text-3xl font-extrabold text-on-surface leading-tight tracking-tight">
                    Members in <span class="text-primary">{{ $workspace->name }}</span>
                </h2>
            </div>
        </header>

        <div class="max-w-4xl mt-8">
            @if (session('success'))
                <div class="mb-6 px-4 py-3 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 px-4 py-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form Invite (Hanya untuk Owner & Admin) --}}
            @if ($canManage)
                <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant mb-8">
                    <h3 class="text-lg font-bold text-on-surface mb-4">Invite New Member</h3>
                    <form action="{{ route('member.workspace.members.store', $workspace) }}" method="POST"
                        class="flex gap-4 items-end">
                        @csrf
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-on-surface mb-1">User Email
                                Address</label>
                            <input type="email" name="email" id="email" required
                                class="w-full px-4 py-2 border border-outline-variant rounded-xl focus:ring-primary focus:border-primary bg-surface"
                                placeholder="member@example.com">
                            @error('email')
                                <p class="text-sm text-error mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="px-5 py-2 bg-primary text-on-primary font-bold rounded-xl shadow hover:shadow-md transition">
                            Invite
                        </button>
                    </form>
                </div>
            @endif

            {{-- Daftar Member --}}
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-surface-container-low text-on-surface-variant text-sm uppercase tracking-wider border-b border-outline-variant">
                            <th class="px-6 py-4 font-bold">Name</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold">Role</th>
                            @if ($canManage)
                                <th class="px-6 py-4 font-bold text-right">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @foreach ($members as $member)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-6 py-4 font-medium text-on-surface">
                                    {{ $member->name }}
                                    @if ($member->id === auth()->id())
                                        <span class="text-xs text-primary font-bold">(You)</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-on-surface-variant">{{ $member->email }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 text-xs font-bold rounded-full 
                                        {{ $member->pivot->role === 'owner'
                                            ? 'bg-primary-container text-on-primary-container'
                                            : ($member->pivot->role === 'admin'
                                                ? 'bg-secondary-container text-on-secondary-container'
                                                : 'bg-surface-variant text-on-surface-variant') }}">
                                        {{ ucfirst($member->pivot->role) }}
                                    </span>
                                </td>

                                @if ($canManage)
                                    <td class="px-6 py-4 text-right">
                                        @if ($member->pivot->role !== 'owner' && $member->id !== auth()->id())
                                            <div class="flex justify-end items-center gap-3">
                                                {{-- Form Ubah Role --}}
                                                <form
                                                    action="{{ route('member.workspace.members.update', [$workspace, $member]) }}"
                                                    method="POST" class="flex items-center gap-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role"
                                                        class="text-sm border border-outline-variant rounded-lg py-1 pl-2 pr-8 bg-surface cursor-pointer focus:ring-primary focus:border-primary"
                                                        onchange="this.form.submit()">
                                                        <option value="member"
                                                            {{ $member->pivot->role === 'member' ? 'selected' : '' }}>
                                                            Member</option>
                                                        <option value="admin"
                                                            {{ $member->pivot->role === 'admin' ? 'selected' : '' }}>Admin
                                                        </option>
                                                    </select>
                                                </form>

                                                {{-- Form Kick --}}
                                                <form
                                                    action="{{ route('member.workspace.members.destroy', [$workspace, $member]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Keluarkan user ini dari workspace?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-sm font-bold text-error hover:underline">
                                                        Kick
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
