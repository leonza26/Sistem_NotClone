@extends('layouts.superadmin')
@section('title', 'Identity & Access')
@section('header_title', 'Identity & Access')

@section('content')
    <!-- X-DATA: Menyimpan state untuk Modal Add dan Modal Edit -->
    <div x-data="{ 
            showAddModal: false, 
            showEditModal: false, 
            editForm: { id: '', name: '', email: '', job_title: '', role: '' } 
        }" class="p-8 max-w-7xl mx-auto space-y-6">

        <!-- Header & Search Actions -->
        <div
            class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl border border-slate-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)]">
            <div>
                <h1 class="text-xl font-outfit font-semibold text-slate-800">User Directory</h1>
                <p class="text-sm text-slate-500 font-light mt-1">Manage and monitor all users across workspaces.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-full md:w-64">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search name or email..."
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-slate-700">
                </form>

                <button @click="showAddModal = true"
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
                                        <div>
                                            <h3 class="text-sm font-medium text-slate-800">{{ $user->name }}</h3>
                                            <p class="text-xs text-slate-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @if($user->role == 0)
                                        <span
                                            class="px-2.5 py-1 bg-indigo-50 text-indigo-600 border border-indigo-100 rounded-md text-xs font-semibold tracking-wide">Admin</span>
                                    @else
                                        <span
                                            class="px-2.5 py-1 bg-slate-100 text-slate-600 border border-slate-200 rounded-md text-xs font-medium">Member</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    @if($user->is_suspended)
                                        <span class="flex items-center gap-1.5 text-xs font-medium text-red-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Suspended
                                        </span>
                                    @else
                                        <span class="flex items-center gap-1.5 text-xs font-medium text-emerald-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-slate-500">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">

                                        <!-- Action: Edit User -->
                                        <button title="Edit User" @click="
                                                editForm.id = '{{ $user->id }}';
                                                editForm.name = '{{ addslashes($user->name) }}';
                                                editForm.email = '{{ $user->email }}';
                                                editForm.job_title = '{{ addslashes($user->job_title) }}';
                                                editForm.role = '{{ $user->role }}';
                                                showEditModal = true;
                                            "
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">edit</span>
                                        </button>

                                        @if($user->id !== auth()->id() && $user->role != 0)
                                            <!-- Action: Impersonate -->
                                            <a href="{{ route('impersonate', $user->id) }}" title="Login as {{ $user->name }}"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">
                                                <span class="material-symbols-outlined text-[18px]">admin_panel_settings</span>
                                            </a>

                                            <!-- Action: Suspend/Ban -->
                                            <button title="{{ $user->is_suspended ? 'Reactivate User' : 'Suspend User' }}"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors {{ $user->is_suspended ? 'text-emerald-500 hover:bg-emerald-50' : 'text-slate-400 hover:text-red-600 hover:bg-red-50' }}"
                                                x-data @click="$dispatch('open-admin-modal', {
                                                        url: '{{ route('admin.users.suspend', $user->id) }}',
                                                        message: '{{ $user->is_suspended ? "Are you sure you want to reactivate " . $user->name . "?" : "Are you sure you want to suspend " . $user->name . "? They will lose access immediately." }}',
                                                        type: 'warning'
                                                    })">
                                                <span
                                                    class="material-symbols-outlined text-[18px]">{{ $user->is_suspended ? 'check_circle' : 'block' }}</span>
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

            @if($users->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50/30">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- ========================================== -->
        <!-- MODAL ADD USER (Premium UI with x-teleport) -->
        <!-- ========================================== -->
        <template x-teleport="body">
            <div x-show="showAddModal" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-0">
                <!-- Backdrop -->
                <div x-show="showAddModal" x-transition.opacity.duration.300ms
                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showAddModal = false"></div>

                <!-- Modal Box -->
                <div x-show="showAddModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col">

                    <!-- Gradient Header -->
                    <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-8 relative overflow-hidden">
                        <!-- Icon Badge -->
                        <div
                            class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-4 border border-white/20 text-white">
                            <span class="material-symbols-outlined text-3xl">person_add</span>
                        </div>
                        <h3 class="text-2xl font-outfit font-semibold text-white mb-1">Create New User</h3>
                        <p class="text-slate-400 text-sm font-light">Add a new member to the ecosystem.</p>

                        <button @click="showAddModal = false"
                            class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors bg-white/5 p-2 rounded-full hover:bg-white/10">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <form action="{{ route('admin.users.store') }}" method="POST" class="px-8 py-6 space-y-5 bg-white">
                        @csrf
                        <div class="grid grid-cols-2 gap-5">
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Full
                                    Name</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Job
                                    Title</label>
                                <input type="text" name="job_title"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Email
                                Address</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label
                                    class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Password</label>
                                <input type="password" name="password" required minlength="8"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">System
                                    Role</label>
                                <select name="role" required
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700 appearance-none">
                                    <option value="1">Member</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-3 justify-end pt-6 mt-4 border-t border-slate-100">
                            <button @click="showAddModal = false" type="button"
                                class="px-6 py-2.5 rounded-xl text-slate-500 font-medium text-sm hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-all">Cancel</button>
                            <button type="submit"
                                class="px-6 py-2.5 rounded-xl bg-slate-900 text-white font-medium text-sm shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>

        <!-- ========================================== -->
        <!-- MODAL EDIT USER (Premium UI with x-teleport) -->
        <!-- ========================================== -->
        <template x-teleport="body">
            <div x-show="showEditModal" x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-0">
                <!-- Backdrop -->
                <div x-show="showEditModal" x-transition.opacity.duration.300ms
                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showEditModal = false"></div>

                <!-- Modal Box -->
                <div x-show="showEditModal" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden flex flex-col">

                    <!-- Gradient Header (Disamakan dengan Add Modal) -->
                    <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-8 relative overflow-hidden">
                        <!-- Icon Badge -->
                        <div
                            class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-4 border border-white/20 text-white">
                            <span class="material-symbols-outlined text-3xl">manage_accounts</span>
                        </div>
                        <div class="flex items-center gap-3 mb-1">
                            <h3 class="text-2xl font-outfit font-semibold text-white">Edit User Details</h3>
                            <span
                                class="px-2.5 py-0.5 rounded-full bg-white/10 text-[10px] font-medium text-slate-300 border border-white/10 tracking-widest"
                                x-text="'ID: ' + editForm.id"></span>
                        </div>
                        <p class="text-slate-400 text-sm font-light">Update member information and access level.</p>

                        <button @click="showEditModal = false"
                            class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors bg-white/5 p-2 rounded-full hover:bg-white/10">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <form :action="'/admin/users/' + editForm.id" method="POST" class="px-8 py-6 space-y-5 bg-white">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-5">
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Full
                                    Name</label>
                                <input type="text" name="name" x-model="editForm.name" required
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Job
                                    Title</label>
                                <input type="text" name="job_title" x-model="editForm.job_title"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Email
                                Address</label>
                            <input type="email" name="email" x-model="editForm.email" required
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Reset Password
                                    <span class="text-[10px] text-slate-400 normal-case">(Optional)</span></label>
                                <input type="password" name="password" minlength="8" placeholder="Leave blank to keep"
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700">
                            </div>
                            <div class="col-span-2 sm:col-span-1 space-y-1">
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider">System
                                    Role</label>
                                <select name="role" x-model="editForm.role" required
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900/10 focus:border-slate-900 transition-all text-slate-700 appearance-none">
                                    <option value="2">Member</option>
                                    <option value="1">Owner</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-3 justify-end pt-6 mt-4 border-t border-slate-100">
                            <button @click="showEditModal = false" type="button"
                                class="px-6 py-2.5 rounded-xl text-slate-500 font-medium text-sm hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-all">Cancel</button>
                            <!-- Tombol Save disamakan dengan gaya Admin (Slate-900) -->
                            <button type="submit"
                                class="px-6 py-2.5 rounded-xl bg-slate-900 text-white font-medium text-sm shadow-lg shadow-slate-900/20 hover:bg-slate-800 transition-all">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </template>

    </div> <!-- PENUTUP DARI x-data -->
@endsection