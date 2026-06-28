@extends('layouts.member')

@section('title', 'Create Project')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-4xl">
        <header class="mb-10">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <a href="{{ route('member.projects') }}" class="hover:text-brand-dark transition-colors">Projects</a>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Create</span>
            </div>
            <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                Create <span class="text-brand-orange">Project.</span>
            </h2>
            <p class="text-brand-slate font-light mt-1 text-sm">Tambahkan project baru dan hubungkan ke workspace Anda.</p>
        </header>

        <div
            class="bg-white p-8 sm:p-10 rounded-[32px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)]">
            <form action="{{ route('member.projects.store') }}" method="POST" x-data="{
                projectName: '{{ old('name') }}',
                projectDesc: `{{ old('description') }}`,
                isGenerating: false,
                suggestWorkflow() {
                    if (!this.projectName) return;
                    this.isGenerating = true;
                    fetch('{{ route('member.ai.suggest_workflow') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ name: this.projectName })
                        })
                        .then(res => res.json())
                        .then(data => {
                            this.isGenerating = false;
                            if (data.success) {
                                this.projectDesc = data.workflow;
                            }
                        })
                        .catch(err => {
                            this.isGenerating = false;
                            console.error(err);
                            alert('Gagal menghubungi AI Copilot');
                        });
                }
            }">
                @csrf

                <!-- Pilih Workspace -->
                <div class="space-y-1.5 mb-6">
                    <label for="workspace_id" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Pilih
                        Workspace</label>
                    <select name="workspace_id" id="workspace_id" required
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none text-brand-dark font-medium cursor-pointer appearance-none">
                        <option value="" disabled selected>-- Pilih Workspace --</option>
                        @foreach ($workspaces as $workspace)
                            <option value="{{ $workspace->id }}"
                                {{ old('workspace_id') == $workspace->id ? 'selected' : '' }}>
                                {{ $workspace->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('workspace_id')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Project -->
                <div class="space-y-1.5 mb-6">
                    <label for="name" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Project
                        Name</label>
                    <input type="text" name="name" id="name" x-model="projectName" required
                        placeholder="e.g. Website Revamp, Marketing Q3..."
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-medium">
                    @error('name')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi Project -->
                <div class="space-y-1.5 mb-8">
                    <div class="flex items-center justify-between mb-1.5 px-1">
                        <label for="description"
                            class="block text-xs font-semibold tracking-wide text-brand-slate">Description & Workflow
                            (Opsional)</label>

                        <!-- Tombol ✨ AI Suggest Workflow -->
                        <button type="button" @click="suggestWorkflow()" :disabled="isGenerating || !projectName"
                            class="text-[11px] font-semibold flex items-center gap-1.5 transition-colors px-2 py-1 rounded-md"
                            :class="isGenerating || !projectName ? 'text-brand-slate/50 cursor-not-allowed' :
                                'text-brand-orange hover:bg-brand-orange/10'">
                            <span class="material-symbols-outlined text-[14px]" :class="isGenerating ? 'animate-spin' : ''">
                                auto_awesome
                            </span>
                            <span x-text="isGenerating ? 'Thinking...' : 'AI Suggest Workflow'"></span>
                        </button>
                    </div>

                    <textarea name="description" id="description" x-model="projectDesc" rows="8"
                        placeholder="Tuliskan detail atau tujuan singkat project ini..."
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-light leading-relaxed custom-scrollbar"></textarea>

                    @error('description')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t border-brand-teal/10">
                    <a href="{{ route('member.projects') }}"
                        class="px-5 py-2.5 text-sm font-medium text-brand-slate bg-brand-surface rounded-xl hover:bg-brand-teal/10 transition-colors">Cancel</a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-brand-orange rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        Save Project
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
