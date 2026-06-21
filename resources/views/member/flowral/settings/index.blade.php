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

    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Sidebar Navigation for Settings -->
        <aside class="w-full lg:w-64 flex-shrink-0 space-y-8">
            <!-- Section 1 -->
            <div>
                <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-3 px-3">Personal</h3>
                <ul class="space-y-1">
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl bg-brand-surface text-brand-orange font-medium text-[13px] border border-brand-teal/10 shadow-sm transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">person</span>
                            My Profile
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-surface text-brand-slate hover:text-brand-dark font-light hover:font-medium text-[13px] transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">notifications</span>
                            Notifications
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Section 2 -->
            <div>
                <h3 class="text-[10px] font-bold uppercase tracking-widest text-brand-slate mb-3 px-3">Workspace</h3>
                <ul class="space-y-1">
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-surface text-brand-slate hover:text-brand-dark font-light hover:font-medium text-[13px] transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">domain</span>
                            General
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-surface text-brand-slate hover:text-brand-dark font-light hover:font-medium text-[13px] transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">group</span>
                            Members
                            <span class="ml-auto bg-brand-dark text-white text-[9px] px-2 py-0.5 rounded-full font-bold">4</span>
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-surface text-brand-slate hover:text-brand-dark font-light hover:font-medium text-[13px] transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">extension</span>
                            Integrations
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-brand-surface text-brand-slate hover:text-brand-dark font-light hover:font-medium text-[13px] transition-all text-left">
                            <span class="material-symbols-outlined text-[18px]">credit_card</span>
                            Billing & Plans
                        </button>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Settings Content Area -->
        <main class="flex-1 bg-white rounded-[32px] border border-brand-teal/10 shadow-sm p-8 lg:p-10 relative overflow-hidden">
            <!-- Decorative blur -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-brand-orange/5 blur-3xl rounded-full"></div>

            <div class="relative z-10 max-w-2xl">
                <!-- Profile Avatar Section -->
                <div class="flex items-center gap-6 mb-12">
                    <div class="relative">
                        <img class="w-24 h-24 rounded-2xl object-cover border border-brand-teal/10 shadow-sm" src="https://ui-avatars.com/api/?name=Leon+Role&size=200&background=F5FAFB&color=282B2A" alt="Profile" />
                        <button class="absolute -bottom-2 -right-2 w-8 h-8 bg-brand-dark text-white rounded-full flex items-center justify-center border-2 border-white shadow-md hover:bg-brand-orange transition-colors">
                            <span class="material-symbols-outlined text-[14px]">photo_camera</span>
                        </button>
                    </div>
                    <div>
                        <h3 class="font-outfit text-xl font-medium text-brand-dark">Profile Picture</h3>
                        <p class="text-[13px] text-brand-slate font-light mt-1 mb-3">We support PNGs, JPEGs and GIFs under 10MB</p>
                        <button class="px-4 py-1.5 text-[12px] font-medium bg-brand-surface text-brand-dark border border-brand-teal/10 rounded-full hover:bg-brand-teal/10 transition-colors">
                            Remove picture
                        </button>
                    </div>
                </div>

                <hr class="border-brand-teal/10 mb-8" />

                <!-- Form Fields -->
                <div class="space-y-6">
                    <!-- Name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">First Name</label>
                            <input type="text" value="Leon" class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none" />
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Last Name</label>
                            <input type="text" value="Role" class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Email Address</label>
                        <input type="email" value="leon.role@flowral.com" class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none" />
                    </div>

                    <!-- Role / Job Title -->
                    <div>
                        <label class="block text-[11px] font-bold text-brand-slate uppercase tracking-widest mb-2">Role / Title</label>
                        <input type="text" value="Software Engineer" class="w-full bg-brand-surface/50 border border-brand-teal/20 rounded-xl px-4 py-3 text-[14px] text-brand-dark font-medium focus:ring-1 focus:ring-brand-orange focus:border-brand-orange transition-all outline-none" />
                    </div>
                </div>

                <div class="mt-12 flex items-center justify-end gap-3">
                    <button class="px-6 py-2.5 text-[13px] font-medium text-brand-slate hover:text-brand-dark transition-colors">
                        Cancel
                    </button>
                    <button class="px-6 py-2.5 text-[13px] font-medium bg-brand-dark text-white rounded-full shadow-lg hover:shadow-xl hover:bg-brand-orange hover:-translate-y-0.5 transition-all">
                        Save Changes
                    </button>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
