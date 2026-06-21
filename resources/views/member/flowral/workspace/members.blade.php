@extends('layouts.member')

@section('title', 'Workspace Members')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-5xl">
        <header class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <a href="{{ route('member.workspace.index') }}"
                    class="flex items-center gap-1 text-[13px] text-brand-slate hover:text-brand-orange transition-colors mb-3 font-medium w-fit">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Back to Workspaces
                </a>
                <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                    Members in <span class="text-brand-orange">{{ $workspace->name }}</span>
                </h2>
            </div>
        </header>

        @if (session('success'))
            <div
                class="mb-8 px-4 py-3 bg-brand-teal/10 border border-brand-teal/20 text-brand-teal rounded-xl text-sm font-medium flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div
                class="mb-8 px-4 py-3 bg-red-50 border border-red-100 text-red-500 rounded-xl text-sm font-medium flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">error</span>
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Invite (Hanya untuk Owner & Admin) --}}
        @if ($canManage)
            <div
                class="bg-white p-6 sm:p-8 rounded-[24px] shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] border border-brand-teal/10 mb-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-8 h-8 rounded-full bg-brand-orange/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-brand-orange text-[18px]">person_add</span>
                    </div>
                    <h3 class="font-outfit text-lg font-medium text-brand-dark">Invite New Member</h3>
                </div>

                <form action="{{ route('member.workspace.members.store', $workspace) }}" method="POST"
                    class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">
                    @csrf
                    <div class="flex-1 w-full space-y-1.5">
                        <label for="email" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Email
                            Address</label>
                        <input type="email" name="email" id="email" required placeholder="colleague@company.com"
                            class="w-full px-4 py-3 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-medium">
                        @error('email')
                            <p class="text-red-500 text-[11px] mt-1 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 bg-brand-dark text-white text-sm font-medium rounded-xl hover:bg-brand-orange shadow-lg hover:-translate-y-0.5 transition-all whitespace-nowrap">
                        Send Invite
                    </button>
                </form>
            </div>
        @endif

        {{-- Daftar Member --}}
        <div
            class="bg-white rounded-[24px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead>
                        <tr class="bg-brand-surface border-b border-brand-teal/10">
                            <th
                                class="px-6 py-4 text-[11px] font-semibold text-brand-slate uppercase tracking-widest w-2/5">
                                Name</th>
                            <th
                                class="px-6 py-4 text-[11px] font-semibold text-brand-slate uppercase tracking-widest w-1/4">
                                Email</th>
                            <th
                                class="px-6 py-4 text-[11px] font-semibold text-brand-slate uppercase tracking-widest w-1/6">
                                Role</th>
                            @if ($canManage)
                                <th
                                    class="px-6 py-4 text-[11px] font-semibold text-brand-slate uppercase tracking-widest text-right">
                                    Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-teal/10">
                        @foreach ($members as $member)
                            <tr class="hover:bg-brand-surface/50 transition-colors group">
                                <!-- Name & Avatar -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=F5FAFB&color=282B2A&bold=true"
                                            class="w-8 h-8 rounded-full border border-brand-teal/20 object-cover"
                                            alt="avatar">
                                        <div>
                                            <p class="font-medium text-brand-dark text-[13px]">
                                                {{ $member->name }}
                                                @if ($member->id === auth()->id())
                                                    <span
                                                        class="text-[10px] text-brand-orange font-bold ml-1 bg-brand-orange/10 px-1.5 py-0.5 rounded">(You)</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <!-- Email -->
                                <td class="px-6 py-4 text-[13px] font-light text-brand-slate">{{ $member->email }}</td>
                                <!-- Role Badge -->
                                <td class="px-6 py-4">
                                    @if ($member->pivot->role === 'owner')
                                        <span
                                            class="px-2.5 py-1 text-[10px] font-bold rounded-md bg-brand-orange/10 text-brand-orange border border-brand-orange/20 uppercase tracking-wide">Owner</span>
                                    @elseif ($member->pivot->role === 'admin')
                                        <span
                                            class="px-2.5 py-1 text-[10px] font-bold rounded-md bg-brand-teal/10 text-brand-teal border border-brand-teal/20 uppercase tracking-wide">Admin</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 text-[10px] font-medium rounded-md bg-brand-surface border border-brand-teal/20 text-brand-slate uppercase tracking-wide">Member</span>
                                    @endif
                                </td>
                                <!-- Actions -->
                                @if ($canManage)
                                    <td class="px-6 py-4 text-right">
                                        @if ($member->pivot->role !== 'owner' && $member->id !== auth()->id())
                                            <div class="flex justify-end items-center gap-2">
                                                {{-- Form Ubah Role --}}
                                                <form
                                                    action="{{ route('member.workspace.members.update', [$workspace, $member]) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role"
                                                        class="text-[12px] font-medium border border-brand-teal/20 rounded-lg py-1.5 pl-2 pr-7 bg-brand-surface text-brand-dark cursor-pointer focus:ring-brand-orange focus:border-brand-orange outline-none transition-all"
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
                                                    onsubmit="return confirm('Keluarkan user ini dari workspace?');"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-8 h-8 flex items-center justify-center rounded-lg text-brand-slate hover:bg-red-50 hover:text-red-500 transition-colors"
                                                        title="Remove Member">
                                                        <span
                                                            class="material-symbols-outlined text-[16px]">person_remove</span>
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
