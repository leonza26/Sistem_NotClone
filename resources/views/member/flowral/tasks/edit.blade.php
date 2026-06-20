@extends('layouts.member')

@section('title', 'Edit Task')

@section('content')
    <div class="px-10 pb-12">
        <header class="max-w-3xl mb-8">
            <div
                class="flex items-center gap-2 text-on-surface-variant text-[11px] font-semibold uppercase tracking-wider mb-2">
                <span>Member</span>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <a href="{{ route('member.tasks') }}" class="hover:text-primary transition-colors">Tasks</a>
                <span class="w-1 h-1 rounded-full bg-primary-fixed"></span>
                <span class="text-primary font-bold">Edit</span>
            </div>
            <h2 class="font-headline text-display-md text-4xl font-extrabold text-on-surface leading-tight tracking-tight">
                Edit <span class="text-primary">Task.</span>
            </h2>
        </header>

        <div class="max-w-3xl mt-8">
            <div class="bg-surface-container-lowest p-8 rounded-2xl shadow-sm border border-outline-variant">
                <form action="{{ route('member.tasks.update', $task) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Pilih Project -->
                        <div>
                            <label for="project_id" class="block text-sm font-bold text-on-surface mb-2">Pilih
                                Project</label>
                            <select name="project_id" id="project_id"
                                class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                                required>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }} ({{ $project->workspace->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-bold text-on-surface mb-2">Status</label>
                            <select name="status" id="status"
                                class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                                required>
                                <option value="todo" {{ old('status', $task->status) == 'todo' ? 'selected' : '' }}>Todo
                                </option>
                                <option value="in_progress"
                                    {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress
                                </option>
                                <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done
                                </option>
                            </select>
                            @error('status')
                                <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Judul Task -->
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-bold text-on-surface mb-2">Task Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3"
                            required>
                        @error('title')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi Task -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-bold text-on-surface mb-2">Description
                            (Opsional)</label>
                        <textarea name="description" id="description" rows="4"
                            class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Assign To -->
                        <div>
                            <label for="assigned_to" class="block text-sm font-bold text-on-surface mb-2">Assign To
                                (Opsional)</label>
                            <select name="assigned_to" id="assigned_to"
                                class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3">
                                <option value="">-- Unassigned --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Due Date -->
                        <div>
                            <label for="due_date" class="block text-sm font-bold text-on-surface mb-2">Due Date
                                (Opsional)</label>
                            <input type="date" name="due_date" id="due_date"
                                value="{{ old('due_date', $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
                                class="block w-full rounded-xl border-outline-variant bg-surface focus:border-primary focus:ring-primary sm:text-sm px-4 py-3">
                            @error('due_date')
                                <p class="text-error text-xs mt-2 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-outline-variant">
                        <a href="{{ route('member.tasks') }}"
                            class="px-5 py-2.5 text-sm font-bold text-on-surface bg-surface-container rounded-xl hover:bg-surface-container-high transition">Batal</a>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-bold text-on-primary bg-primary rounded-xl shadow-md hover:shadow-lg transition">Update
                            Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
