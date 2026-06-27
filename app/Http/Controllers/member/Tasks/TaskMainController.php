<?php

namespace App\Http\Controllers\member\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskMainController extends Controller
{
    public function index()
    {
        // 1. Dapatkan semua Workspace ID dari user
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));
        // 2. Dapatkan Project ID dari workspace-workspace tersebut
        $projectIds = Project::whereIn('workspace_id', $allWorkspaceIds)->pluck('id')->toArray();
        // 3. Ambil Task dan langsung pisahkan sesuai status untuk masing-masing kolom Kanban
        $todoTasks = Task::whereIn('project_id', $projectIds)->where('status', 'todo')->get();
        $inProgressTasks = Task::whereIn('project_id', $projectIds)->where('status', 'in_progress')->get();
        $doneTasks = Task::whereIn('project_id', $projectIds)->where('status', 'done')->get();
        return view('member.flowral.tasks.index', compact('todoTasks', 'inProgressTasks', 'doneTasks'));
    }
    public function create()
    {
        // Untuk membuat Task, user butuh list Project (di dalam workspacenya)
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));

        $projects = Project::with('workspace.users')->whereIn('workspace_id', $allWorkspaceIds)->get();
        if ($projects->isEmpty()) {
            return redirect()->route('member.projects')->with('error', 'Silakan buat Project terlebih dahulu sebelum membuat Task.');
        }
        return view('member.flowral.tasks.create', compact('projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'assigned_to' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
        ]);

        // Simpan task baru ke variabel $task
        $task = Task::create($request->all());
        // --- LOGIKA NOTIFIKASI ---
        // Jika ada yang di-assign, dan orang itu bukan kita sendiri (Auth::id())
        if ($task->assigned_to && $task->assigned_to != Auth::id()) {
            $user = User::find($task->assigned_to);
            $user->notify(new \App\Notifications\TaskAssigned($task));
        }
        // -------------------------
        return redirect()->route('member.tasks')->with('success', 'Task berhasil dibuat!');
    }


    public function show(Task $task)
    {
        // Load task beserta relasi komentar dan data usernya (biar query efisien)
        $task->load('comments.user');
        return view('member.flowral.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));

        $projects = Project::with('workspace.users')->whereIn('workspace_id', $allWorkspaceIds)->get();
        return view('member.flowral.tasks.edit', compact('task', 'projects'));
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
            'assigned_to' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
        ]);

        // Update task-nya
        $task->update($request->all());
        // --- LOGIKA NOTIFIKASI ---
        // wasChanged() mengecek apakah kolom 'assigned_to' benar-benar baru saja diubah
        // Ini mencegah notifikasi terkirim berulang kali saat kita cuma mengedit judul task
        if ($task->wasChanged('assigned_to') && $task->assigned_to && $task->assigned_to != Auth::id()) {
            $user = User::find($task->assigned_to);
            $user->notify(new \App\Notifications\TaskAssigned($task));
        }
        // -------------------------
        return redirect()->route('member.tasks')->with('success', 'Task berhasil diperbarui!');
    }

    public function updateStatus(Request $request, Task $task)
    {
        // Validasi status baru
        $request->validate([
            'status' => 'required|in:todo,in_progress,done'
        ]);

        // Update status di database
        $task->update(['status' => $request->status]);

        // Kembalikan respon JSON (karena ini akan dipanggil oleh Javascript/AJAX di latar belakang)
        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diubah'
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('member.tasks')->with('success', 'Task berhasil dihapus!');
    }
}
