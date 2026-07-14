@extends('layouts.member')

@section('title', 'Workspace Settings')

@section('content')
    <div class="max-w-[1200px] mx-auto px-8 py-10 h-[calc(100vh-4rem)] overflow-y-auto custom-scrollbar">
        <!-- Header -->
        <div class="mb-10">
            <h2 class="font-outfit text-4xl font-medium text-brand-dark tracking-tight">
                Settings & <span class="text-brand-orange">Preferences.</span>
            </h2>
            <p class="text-brand-slate font-light mt-2 text-sm max-w-2xl">
                Manage your personal profile, workspace preferences, and team configurations.
            </p>
        </div>

        <!-- Alpine.js x-data -->
        <div x-data="{ activeTab: 'profile' }" class="flex flex-col lg:flex-row gap-12">

            <!-- Sidebar Navigation -->
            <aside class="w-full lg:w-64 flex-shrink-0 space-y-8">
                <!-- Section 1: Personal -->
                <div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-3 px-3">Personal</h3>
                    <ul class="space-y-1">
                        <li>
                            <button @click="activeTab = 'profile'"
                                :class="activeTab === 'profile' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">person</span>
                                My Profile
                            </button>
                        </li>
                        <li>
                            <button @click="activeTab = 'notifications'"
                                :class="activeTab === 'notifications' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">notifications</span>
                                Notifications
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Section 2: Workspace -->
                <div>
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-3 px-3">Workspace</h3>
                    <ul class="space-y-1">
                        <li>
                            <button @click="activeTab = 'general'"
                                :class="activeTab === 'general' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">domain</span>
                                General
                            </button>
                        </li>
                        <li>
                            <button @click="activeTab = 'members'"
                                :class="activeTab === 'members' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">group</span>
                                Members
                            </button>
                        </li>
                        <li>
                            <button @click="activeTab = 'integrations'"
                                :class="activeTab === 'integrations' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">extension</span>
                                Integrations
                            </button>
                        </li>
                        <li>
                            <button @click="activeTab = 'billing'"
                                :class="activeTab === 'billing' ?
                                    'bg-brand-surface text-brand-orange shadow-sm border-brand-teal/10' :
                                    'text-brand-slate hover:bg-brand-surface hover:text-brand-dark border-transparent'"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-[13px] border transition-all text-left">
                                <span class="material-symbols-outlined text-[18px]">credit_card</span>
                                Billing & Plans
                            </button>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Settings Content Area -->
            <main
                class="flex-1 bg-white rounded-[32px] border border-brand-teal/10 shadow-sm p-8 lg:p-10 relative overflow-hidden min-h-[500px]">
                <div
                    class="absolute -top-10 -right-10 w-40 h-40 bg-brand-orange/5 blur-3xl rounded-full pointer-events-none">
                </div>

                <div class="relative z-10 max-w-2xl">

                    <!-- 1. TAB: PROFILE (SEKARANG DIBUNGKUS FORM) -->
                    <div x-show="activeTab === 'profile'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">

                        <form action="{{ route('member.settings.profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <h3 class="font-outfit text-xl font-medium text-brand-dark mb-6">My Profile</h3>


                            <!-- Profile Avatar Section -->
                            <div class="flex items-center gap-6 mb-10">
                                <div class="relative group">
                                    @php
                                        $avatarUrl = Auth::user()->avatar
                                            ? asset('storage/' . Auth::user()->avatar)
                                            : 'https://ui-avatars.com/api/?name=' .
                                                urlencode(Auth::user()->name) .
                                                '&size=200&background=F5FAFB&color=282B2A';
                                    @endphp
                                    <img class="w-24 h-24 rounded-2xl object-cover border border-brand-teal/10 shadow-sm"
                                        src="{{ $avatarUrl }}" alt="Profile" />

                                    <label
                                        class="absolute -bottom-2 -right-2 w-8 h-8 bg-brand-dark text-white rounded-full flex items-center justify-center border-2 border-white shadow-md hover:bg-brand-orange transition-colors cursor-pointer">
                                        <span class="material-symbols-outlined text-[14px]">photo_camera</span>
                                        <input type="file" name="avatar" class="hidden" accept="image/*" />
                                    </label>
                                </div>
                                <div>
                                    <p class="text-[13px] text-brand-slate font-light mt-1 mb-3">We support PNGs, JPEGs and
                                        GIFs under 10MB.<br />Click the camera icon to upload.</p>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label
                                            class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Full
                                            Name</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                            class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none"
                                            required />
                                    </div>
                                    <div>
                                        <label
                                            class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Email
                                            Address</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                                            class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none"
                                            required />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Role
                                        / Title</label>
                                    <!-- Memeriksa apakah properti job_title ada, karena kolom ini baru dibuat di DB -->
                                    <input type="text" name="job_title" value="{{ Auth::user()->job_title ?? '' }}"
                                        class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none"
                                        placeholder="e.g. Software Engineer" />
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button type="submit"
                                    class="px-6 py-2.5 text-[13px] font-medium bg-brand-dark text-white rounded-full shadow-lg hover:shadow-xl hover:bg-brand-orange transition-all">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- 2. TAB: NOTIFICATIONS -->
                    <div x-show="activeTab === 'notifications'" x-cloak style="display: none;"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h3 class="font-outfit text-xl font-medium text-brand-dark mb-2">Notification Preferences</h3>
                        <p class="text-[13px] text-brand-slate font-light mb-8">Choose how you want to be notified about
                            activity in your workspace.</p>

                        <div class="space-y-4">
                            <label
                                class="flex items-center justify-between p-4 border border-brand-teal/10 rounded-xl hover:bg-brand-surface/50 transition-colors cursor-pointer">
                                <div>
                                    <h4 class="text-[14px] font-medium text-brand-dark">Email Notifications</h4>
                                    <p class="text-[12px] text-brand-slate font-light mt-0.5">Receive daily summaries and
                                        important mentions via email.</p>
                                </div>
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-brand-orange focus:ring-brand-orange border-brand-teal/20 rounded">
                            </label>
                        </div>
                    </div>

                    <!-- 3. TAB: GENERAL (WORKSPACE) -->
                    <div x-show="activeTab === 'general'" x-cloak style="display: none;"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h3 class="font-outfit text-xl font-medium text-brand-dark mb-8">Workspace General Settings</h3>
                        <div class="space-y-6">
                            <div>
                                <label
                                    class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Workspace
                                    Name</label>
                                <input type="text" value="My Private Workspace"
                                    class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange transition-all outline-none" />
                            </div>
                        </div>
                    </div>

                    <!-- 4. TAB: MEMBERS -->
                    <div x-show="activeTab === 'members'" x-cloak style="display: none;"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="font-outfit text-xl font-medium text-brand-dark">Workspace Members</h3>
                                <p class="text-[13px] text-brand-slate font-light mt-1">Manage who has access to this
                                    workspace.</p>
                            </div>
                            <a href="{{ route('member.workspace.index') }}"
                                class="px-4 py-2 bg-brand-surface text-brand-dark text-xs font-medium rounded-full border border-brand-teal/10 hover:bg-brand-dark hover:text-white transition-colors">
                                Manage in Workspace
                            </a>
                        </div>
                    </div>

                    <!-- 5. TAB: INTEGRATIONS -->
                    <div x-show="activeTab === 'integrations'" x-cloak style="display: none;"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h3 class="font-outfit text-xl font-medium text-brand-dark mb-2">Connected Apps</h3>
                        <p class="text-[13px] text-brand-slate font-light mb-8">Connect Flowral with your favorite tools to
                            supercharge your workflow.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div
                                class="p-5 border border-brand-teal/10 rounded-2xl bg-white shadow-sm flex flex-col justify-between h-36">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center text-white">
                                        <span class="material-symbols-outlined text-[18px]">code</span></div>
                                    <h4 class="font-medium text-brand-dark text-sm">GitHub</h4>
                                </div>
                                <div class="flex justify-between items-end mt-4">
                                    <p class="text-[11px] text-brand-slate font-light leading-snug">Sync commits and pull
                                        requests.</p>
                                    <button
                                        class="px-3 py-1 bg-brand-surface text-[10px] font-semibold text-brand-dark rounded-md">Connect</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6. TAB: BILLING & PLANS -->
                    <div x-show="activeTab === 'billing'" x-cloak style="display: none;"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="text-center py-12 px-6">
                            <div
                                class="w-20 h-20 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-white shadow-lg">
                                <span class="material-symbols-outlined text-brand-orange text-4xl">rocket_launch</span>
                            </div>
                            <h3 class="font-outfit text-3xl font-medium text-brand-dark mb-3">Flowral 1.0 is 100% Free!
                            </h3>
                            <p class="text-[14px] text-brand-slate font-light max-w-md mx-auto mb-8 leading-relaxed">
                                Premium plans and billing infrastructure will be introduced in future updates. Enjoy
                                building!
                            </p>
                            <span
                                class="px-4 py-2 bg-brand-dark text-white text-xs font-medium rounded-full tracking-wider uppercase">Coming
                                Soon</span>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
@endsection
