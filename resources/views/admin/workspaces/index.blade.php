@extends('layouts.superadmin')
@section('title', 'Workspace Ecosystem')
@section('header_title', 'Workspace Ecosystem')

@section('content')
<div class="p-8 max-w-7xl mx-auto space-y-6">

    <!-- Header & Search Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)]">
        <div>
            <h1 class="text-xl font-outfit font-semibold text-slate-800">Workspace Directory</h1>
            <p class="text-sm text-slate-500 font-light mt-1">Monitor all tenant workspaces and their current status.</p>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <form action="{{ route('admin.workspaces.index') }}" method="GET" class="relative w-full md:w-64">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search workspaces..." 
                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-slate-700">
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-medium">
                        <th class="py-4 px-6">Workspace</th>
                        <th class="py-4 px-6">Owner</th>
                        <th class="py-4 px-6 text-center">Members</th>
                        <th class="py-4 px-6 text-center">Projects</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($workspaces as $workspace)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 font-semibold shrink-0">
                                    {{ substr($workspace->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-slate-800">{{ $workspace->name }}</h3>
                                    <p class="text-xs text-slate-500">ID: {{ $workspace->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                                    @if($workspace->owner->avatar)
                                        <img src="{{ Storage::url($workspace->owner->avatar) }}" alt="{{ $workspace->owner->name }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-[10px] font-medium text-slate-500">{{ substr($workspace->owner->name, 0, 2) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm text-slate-700 font-medium leading-tight">{{ $workspace->owner->name }}</p>
                                    <p class="text-[11px] text-slate-400">{{ $workspace->owner->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">
                                {{ $workspace->users_count }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">
                                {{ $workspace->projects_count }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @if($workspace->is_disabled)
                                <span class="flex items-center gap-1.5 text-xs font-medium text-red-600">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Disabled
                                </span>
                            @else
                                <span class="flex items-center gap-1.5 text-xs font-medium text-emerald-600">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                
                                <!-- Action: Enable/Disable Workspace -->
                                <button title="{{ $workspace->is_disabled ? 'Enable Workspace' : 'Disable Workspace' }}" 
                                    class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ $workspace->is_disabled ? 'text-emerald-500 hover:bg-emerald-50' : 'text-slate-400 hover:text-red-600 hover:bg-red-50' }}"
                                    x-data @click="$dispatch('open-admin-modal', {
                                        url: '{{ route('admin.workspaces.toggle', $workspace->id) }}',
                                        message: '{{ $workspace->is_disabled ? "Are you sure you want to re-enable ".$workspace->name."? All members will regain access." : "Are you sure you want to freeze ".$workspace->name."? All members will instantly lose access." }}',
                                        type: 'warning'
                                    })">
                                    <span class="material-symbols-outlined text-[18px]">{{ $workspace->is_disabled ? 'play_circle' : 'pause_circle' }}</span>
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center">
                            <div class="w-16 h-16 rounded-full bg-slate-50 mx-auto flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-slate-300 text-3xl">domain_disabled</span>
                            </div>
                            <p class="text-slate-500 font-medium">No workspaces found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($workspaces->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/30">
            {{ $workspaces->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
