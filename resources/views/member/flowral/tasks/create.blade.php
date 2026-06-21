@extends('layouts.member')

@section('title', 'Create Task')

@section('content')
    <div class="px-8 lg:px-10 pb-12 pt-4 max-w-4xl">
        <header class="mb-10">
            <div
                class="flex items-center gap-2 text-brand-slate/60 text-[11px] font-semibold uppercase tracking-widest mb-3">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <a href="{{ route('member.tasks') }}" class="hover:text-brand-dark transition-colors">Tasks</a>
                <span class="w-1 h-1 rounded-full bg-brand-orange"></span>
                <span class="text-brand-orange font-bold">Create</span>
            </div>
            <h2 class="font-outfit text-3xl font-medium text-brand-dark leading-tight tracking-tight">
                Create <span class="text-brand-orange">Task.</span>
            </h2>
            <p class="text-brand-slate font-light mt-1 text-sm">Tambahkan pekerjaan baru dan assign ke anggota tim Anda.</p>
        </header>

        <div
            class="bg-white p-8 sm:p-10 rounded-[32px] border border-brand-teal/10 shadow-[0_4px_20px_-10px_rgba(48,71,78,0.05)]">
            <form action="{{ route('member.tasks.store') }}" method="POST" x-data="{
                projects: {{ $projects->toJson() }},
                selectedProjectId: '{{ old('project_id') }}',
                assignedTo: '{{ old('assigned_to') }}',
                get availableUsers() {
                    if (!this.selectedProjectId) return [];
                    let project = this.projects.find(p => p.id == this.selectedProjectId);
                    return project && project.workspace && project.workspace.users ? project.workspace.users : [];
                }
            }">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Pilih Project -->
                    <div class="space-y-1.5">
                        <label for="project_id"
                            class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Pilih Project</label>
                        <select name="project_id" id="project_id" x-model="selectedProjectId" @change="assignedTo = ''"
                            required
                            class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none text-brand-dark font-medium cursor-pointer appearance-none">
                            <option value="" disabled>-- Pilih Project --</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ $project->name }} ({{ $project->workspace->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="space-y-1.5">
                        <label for="status" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Status
                            Awal</label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none text-brand-dark font-medium cursor-pointer appearance-none">
                            <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>To Do</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Judul Task -->
                <div class="space-y-1.5 mb-6">
                    <label for="title" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Task
                        Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        placeholder="e.g. Design Homepage, Fix Database Bug..."
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-medium">
                    @error('title')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi Task -->
                <div class="space-y-1.5 mb-6">
                    <label for="description"
                        class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Description
                        (Opsional)</label>
                    <textarea name="description" id="description" rows="4" placeholder="Tuliskan detail pekerjaan ini..."
                        class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none placeholder:text-brand-slate/40 text-brand-dark font-light leading-relaxed custom-scrollbar">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Assign To -->
                    <div class="space-y-1.5">
                        <label for="assigned_to"
                            class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Assign To
                            (Opsional)</label>
                        <select name="assigned_to" id="assigned_to" x-model="assignedTo"
                            class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none text-brand-dark font-medium cursor-pointer appearance-none">
                            <option value="">-- Unassigned --</option>
                            <template x-for="user in availableUsers" :key="user.id">
                                <option :value="user.id" x-text="user.name"></option>
                            </template>
                        </select>
                        @error('assigned_to')
                            <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Due Date -->
                    <div class="space-y-1.5">
                        <label for="due_date" class="block text-xs font-semibold tracking-wide text-brand-slate ml-1">Due
                            Date (Opsional)</label>
                        <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                            class="w-full px-4 py-3.5 bg-brand-surface border border-brand-teal/20 rounded-xl focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all text-sm outline-none text-brand-dark font-medium text-brand-slate">
                        @error('due_date')
                            <p class="text-red-500 text-[11px] mt-1.5 font-medium ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-6 border-t border-brand-teal/10">
                    <a href="{{ route('member.tasks') }}"
                        class="px-5 py-2.5 text-sm font-medium text-brand-slate bg-brand-surface rounded-xl hover:bg-brand-teal/10 transition-colors">Cancel</a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-brand-orange rounded-xl shadow-[0_4px_14px_0_rgba(229,117,0,0.39)] hover:shadow-[0_6px_20px_rgba(229,117,0,0.23)] hover:-translate-y-0.5 transition-all">
                        Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
