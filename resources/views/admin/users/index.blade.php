@extends('layouts.superadmin')
@section('title', 'Identity & Access')
@section('header_title', 'Identity & Access')

@section('content')
    <div class="p-8 max-w-7xl mx-auto space-y-6">

        <!-- Header & Search Actions -->
        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)]">
            <div>
                <h1 class="text-xl font-outfit font-semibold text-slate-800">User Directory</h1>
                <p class="text-sm text-slate-500 font-light mt-1">Manage and monitor all users across workspaces.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <!-- Search Bar -->
                <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-full md:w-64">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search name or email..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-slate-700">
                </form>
                <button
                    class="px-4 py-2.5 bg-slate-900 text-white rounded-xl font-medium text-sm hover:bg-slate-800 transition-colors shadow-lg shadow-slate-900/20 whitespace-nowrap flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">person_add</span>
                    Add User
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-medium">
                            <th class="py-4 px-6">User</th>
                            <th class="py-4 px-6">Role</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6">Joined Date</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($users as $user)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <!-- Avatar -->
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center overflow-hidden shrink-0">
                                            @if($user->avatar)
                                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <span
                                                    class="text-slate-500 font-medium text-sm">{{ substr($user->name, 0, 2) }}</span>
                                            @endif
                                        </div>
                                        <!-- Name & Email -->
                                        <div>
                                            <h3 class="text-sm font-medium text-slate-800">{{ $user->name }}</h3>
                                            <p class="text-xs text-slate-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @if($user->role === 0)
                                        <span
                                            class="px-2.5 py-1 bg-indigo-50 text-indigo-600 border border-indigo-100 rounded-md text-xs font-semibold tracking-wide">Admin</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 bg-slate-100 text-slate-600 border border-slate-200 rounded-md text-xs font-medium">Member</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <span class="flex items-center gap-1.5 text-xs font-medium text-emerald-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-slate-500">
                                    {{ $user->created_at->format('M d, Y') }}7
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <!-- Action: Impersonate (Login as) -->
                                        <button title="Login as User"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">admin_panel_settings</span>
                                        </button>
                                        <!-- Action: Suspend/Ban -->
                                        @if($user->id !== auth()->id())
                                            <button title="Suspend User"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors"
                                                x-data @click="$dispatch('open-admin-modal', {
                                                                url: '#',
                                                                message: 'Are you sure you want to suspend {{ $user->name }}? They will lose access immediately.',
                                                                type: 'warning'
                                                            })">
                                                <span class="material-symbols-outlined text-[18px]">block</span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center">
                                    <div
                                        class="w-16 h-16 rounded-full bg-slate-50 mx-auto flex items-center justify-center mb-3">
                                        <span class="material-symbols-outlined text-slate-300 text-3xl">search_off</span>
                                    </div>
                                    <p class="text-slate-500 font-medium">No users found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50/30">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection