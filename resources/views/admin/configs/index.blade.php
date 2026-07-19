@extends('layouts.superadmin')
@section('title', 'Global Configurations')
@section('header_title', 'System Configurations')

@section('content')
    <div class="p-8 max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-2xl font-bold font-outfit text-slate-800">Global Settings</h1>
            <p class="text-sm text-slate-500 mt-1">Control system behavior, feature availability, and global limits without
                touching the code.</p>
        </div>

        <!-- Gunakan Form untuk mengupdate semua setting sekaligus -->
        <form action="{{ route('admin.configs.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- BAGIAN 1: SYSTEM STATUS (DANGER ZONE) -->
            <div
                class="bg-white rounded-2xl border border-red-100 shadow-[0_2px_15px_-3px_rgba(239,68,68,0.05)] overflow-hidden">
                <div class="p-5 border-b border-red-50 bg-red-50/50 flex items-center gap-3">
                    <span class="material-symbols-outlined text-red-500">warning</span>
                    <div>
                        <h2 class="text-base font-semibold text-red-700">System Status (Danger Zone)</h2>
                        <p class="text-[11px] text-red-500/80">Only use this in emergencies or during upgrades.</p>
                    </div>
                </div>
                <div class="p-6">
                    <label
                        class="flex items-center justify-between cursor-pointer p-4 border border-slate-100 rounded-xl hover:bg-slate-50 transition-colors">
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Maintenance Mode</p>
                            <p class="text-xs text-slate-500 mt-1">Activate to block all member access and display the
                                maintenance screen. (Super Admins bypass this).</p>
                        </div>
                        <!-- Saklar Toggle dengan Tailwind CSS -->
                        <!-- Saklar Alpine.js Anti-Gagal -->
                        <div x-data="{ checked: {{ isset($settings['maintenance_mode']) && filter_var($settings['maintenance_mode'], FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false' }} }"
                            class="flex items-center">
                            <input type="checkbox" name="maintenance_mode" value="1" x-model="checked" class="hidden">
                            <button type="button" @click="checked = !checked"
                                :class="checked ? 'bg-red-500' : 'bg-slate-300'"
                                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                <span :class="checked ? 'translate-x-6' : 'translate-x-1'"
                                    class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform shadow-sm"></span>
                            </button>
                        </div>
                    </label>
                </div>
            </div>

            <!-- BAGIAN 2: FEATURE FLAGS -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                    <span class="material-symbols-outlined text-indigo-500">toggle_on</span>
                    <div>
                        <h2 class="text-base font-semibold text-slate-800">Feature Flags</h2>
                        <p class="text-[11px] text-slate-500">Enable or disable specific modules globally.</p>
                    </div>
                </div>
                <div class="p-6 space-y-4">

                    <label
                        class="flex items-center justify-between cursor-pointer p-4 border border-slate-100 rounded-xl hover:bg-slate-50 transition-colors">
                        <div>
                            <p class="text-sm font-semibold text-slate-800">AI Assistant Module</p>
                            <p class="text-xs text-slate-500 mt-1">Allow members to use the AI Assistant features within
                                their workspaces.</p>
                        </div>
                        <div x-data="{ checked: {{ isset($settings['feature_ai_assistant']) && filter_var($settings['feature_ai_assistant'], FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false' }} }"
                            class="flex items-center">
                            <input type="checkbox" name="feature_ai_assistant" value="1" x-model="checked" class="hidden">
                            <button type="button" @click="checked = !checked"
                                :class="checked ? 'bg-indigo-500' : 'bg-slate-300'"
                                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                <span :class="checked ? 'translate-x-6' : 'translate-x-1'"
                                    class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform shadow-sm"></span>
                            </button>
                        </div>
                    </label>

                    <label
                        class="flex items-center justify-between cursor-pointer p-4 border border-slate-100 rounded-xl hover:bg-slate-50 transition-colors">
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Open Public Registration</p>
                            <p class="text-xs text-slate-500 mt-1">Allow new users to create accounts. Turn off to make the
                                app invite-only.</p>
                        </div>
                        <div x-data="{ checked: {{ isset($settings['feature_open_registration']) && filter_var($settings['feature_open_registration'], FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false' }} }"
                            class="flex items-center">
                            <input type="checkbox" name="feature_open_registration" value="1" x-model="checked"
                                class="hidden">
                            <button type="button" @click="checked = !checked"
                                :class="checked ? 'bg-emerald-500' : 'bg-slate-300'"
                                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                <span :class="checked ? 'translate-x-6' : 'translate-x-1'"
                                    class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform shadow-sm"></span>
                            </button>
                        </div>
                    </label>

                </div>
            </div>

            <!-- BAGIAN 3: GLOBAL VARIABLES -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                    <span class="material-symbols-outlined text-teal-500">data_usage</span>
                    <div>
                        <h2 class="text-base font-semibold text-slate-800">Global Variables & Limits</h2>
                        <p class="text-[11px] text-slate-500">Configure numeric limits and thresholds.</p>
                    </div>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-semibold text-slate-800 mb-1">Max Upload Size (MB)</label>
                        <p class="text-[11px] text-slate-500 mb-2">Maximum file size a user can upload.</p>
                        <input type="number" name="max_upload_size" value="{{ $settings['max_upload_size'] ?? 10 }}"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-teal-500/20 transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-800 mb-1">Free Workspace Limit</label>
                        <p class="text-[11px] text-slate-500 mb-2">Max projects allowed in a free workspace.</p>
                        <input type="number" name="free_workspace_limit"
                            value="{{ $settings['free_workspace_limit'] ?? 3 }}"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-teal-500/20 transition-all">
                    </div>

                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="px-6 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium rounded-xl transition-all shadow-md hover:shadow-lg flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Save Configurations
                </button>
            </div>

        </form>
    </div>
@endsection