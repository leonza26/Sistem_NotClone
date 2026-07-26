@extends('layouts.superadmin')
@section('title', 'Global Broadcasts')
@section('header_title', 'Broadcast & Announcements')

@section('content')
<div class="p-8 max-w-6xl mx-auto" x-data="{ activeTab: 'banners' }">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold font-outfit text-slate-800">Communication Center</h1>
            <p class="text-sm text-slate-500 mt-1">Manage global banners and publish release notes to your members.</p>
        </div>

        <!-- Alpine Tabs Navigation -->
        <div class="inline-flex bg-slate-100 p-1 rounded-xl">
            <button @click="activeTab = 'banners'" :class="activeTab === 'banners' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="px-6 py-2 text-sm font-medium rounded-lg transition-all">
                Global Banners
            </button>
            <button @click="activeTab = 'changelogs'" :class="activeTab === 'changelogs' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500 hover:text-slate-700'" class="px-6 py-2 text-sm font-medium rounded-lg transition-all">
                Release Notes
            </button>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- TAB 1: GLOBAL BANNERS                      -->
    <!-- ========================================== -->
    <div x-show="activeTab === 'banners'" x-transition.opacity.duration.300ms>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Form Tambah Banner -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-teal-600 text-[20px]">add_alert</span>
                        Create Banner
                    </h2>
                    
                    <form action="{{ route('admin.broadcasts.banners.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Message</label>
                            <textarea name="message" rows="3" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-600/20 transition-all resize-none" placeholder="e.g. Scheduled maintenance at 00:00 UTC"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Type / Color</label>
                            <select name="type" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-600/20 transition-all">
                                <option value="info">Info (Blue)</option>
                                <option value="warning">Warning (Yellow)</option>
                                <option value="danger">Danger (Red)</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3 pt-2">
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="w-4 h-4 text-teal-600 bg-slate-100 border-slate-300 rounded focus:ring-teal-500">
                            <label for="is_active" class="text-sm font-medium text-slate-700 cursor-pointer">Activate Immediately</label>
                        </div>
                        <button type="submit" class="w-full py-3 bg-slate-800 hover:bg-slate-700 text-white text-sm font-medium rounded-xl transition-all shadow-md">
                            Publish Banner
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Banner -->
            <div class="lg:col-span-2 space-y-4">
                @forelse($banners as $banner)
                    <div class="bg-white rounded-2xl border {{ $banner->is_active ? 'border-teal-200 shadow-md shadow-teal-500/5' : 'border-slate-200 shadow-sm' }} overflow-hidden flex items-stretch transition-all">
                        
                        <!-- Color Bar -->
                        <div class="w-2 {{ $banner->type === 'danger' ? 'bg-red-500' : ($banner->type === 'warning' ? 'bg-yellow-500' : 'bg-blue-500') }}"></div>
                        
                        <div class="p-5 flex-1 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-[10px] uppercase tracking-wider font-bold {{ $banner->type === 'danger' ? 'text-red-600' : ($banner->type === 'warning' ? 'text-yellow-600' : 'text-blue-600') }}">{{ $banner->type }}</span>
                                    <span class="text-xs text-slate-400">• {{ $banner->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm font-medium text-slate-800">{{ $banner->message }}</p>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <!-- Tombol Toggle -->
                                <form action="{{ route('admin.broadcasts.banners.toggle', $banner->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold border transition-all {{ $banner->is_active ? 'bg-teal-50 text-teal-700 border-teal-200 hover:bg-teal-100' : 'bg-slate-50 text-slate-500 border-slate-200 hover:bg-slate-100' }}">
                                        {{ $banner->is_active ? 'Active' : 'Off' }}
                                    </button>
                                </form>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.broadcasts.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-all">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-12 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center justify-center text-center">
                        <span class="material-symbols-outlined text-slate-300 text-5xl mb-3">campaign</span>
                        <h3 class="text-lg font-medium text-slate-800">No Banners Yet</h3>
                        <p class="text-sm text-slate-500 max-w-sm mt-1">Create your first global announcement using the form.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- TAB 2: CHANGELOGS                          -->
    <!-- ========================================== -->
    <div x-show="activeTab === 'changelogs'" x-transition.opacity.duration.300ms style="display: none;">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Form Tambah Changelog -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h2 class="text-base font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-indigo-600 text-[20px]">edit_document</span>
                        Publish Release
                    </h2>
                    
                    <form action="{{ route('admin.broadcasts.changelogs.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Version</label>
                                <input type="text" name="version" required placeholder="e.g. v1.2.0" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600/20 transition-all font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Date</label>
                                <input type="date" name="released_at" required value="{{ date('Y-m-d') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600/20 transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Title</label>
                            <input type="text" name="title" required placeholder="Major UI Update & Bug Fixes" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Details (Markdown/Text)</label>
                            <textarea name="content" rows="5" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600/20 transition-all resize-none" placeholder="- Added new dashboard...&#10;- Fixed login issue..."></textarea>
                        </div>
                        <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl transition-all shadow-md shadow-indigo-500/30">
                            Publish Release Notes
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Changelogs (Timeline Style) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 relative">
                    
                    @if($changelogs->count() > 0)
                        <!-- Garis Timeline (Desktop) -->
                        <div class="hidden sm:block absolute left-[88px] top-10 bottom-10 w-0.5 bg-slate-100"></div>

                        <div class="space-y-8 relative z-10">
                            @foreach($changelogs as $log)
                                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 group">
                                    <!-- Tanggal & Versi -->
                                    <div class="sm:w-24 shrink-0 text-left sm:text-right pt-1">
                                        <p class="text-sm font-bold text-slate-800">{{ $log->version }}</p>
                                        <p class="text-[10px] uppercase font-semibold tracking-wider text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($log->released_at)->format('M d, Y') }}</p>
                                    </div>
                                    
                                    <!-- Titik Timeline (Desktop) -->
                                    <div class="hidden sm:flex shrink-0 w-8 h-8 rounded-full bg-white border-[3px] border-indigo-100 items-center justify-center group-hover:border-indigo-500 transition-colors mt-0.5 shadow-sm">
                                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                    </div>

                                    <!-- Konten Changelog -->
                                    <div class="flex-1 bg-slate-50/50 rounded-2xl p-5 border border-slate-100 hover:border-slate-200 transition-colors">
                                        <div class="flex justify-between items-start gap-4 mb-3">
                                            <h3 class="text-base font-bold text-slate-800">{{ $log->title }}</h3>
                                            
                                            <form action="{{ route('admin.broadcasts.changelogs.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-slate-300 hover:text-red-500 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-slate-600 whitespace-pre-wrap leading-relaxed">{{ $log->content }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $changelogs->links() }}
                        </div>
                    @else
                        <div class="py-12 flex flex-col items-center justify-center text-center">
                            <span class="material-symbols-outlined text-slate-300 text-5xl mb-3">history</span>
                            <h3 class="text-lg font-medium text-slate-800">No Release Notes</h3>
                            <p class="text-sm text-slate-500 mt-1">Publish your first changelog to keep users updated.</p>
                        </div>
                    @endif

                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection