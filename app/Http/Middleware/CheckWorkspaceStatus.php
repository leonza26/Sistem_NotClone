<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkspaceStatus
{
    /**
     * Mega-Middleware: Melacak akar Workspace dari segala jenis entitas (Project/Task/Note)
     * dan memblokir akses jika Workspace-nya berstatus frozen (disabled).
     */
    public function handle(Request $request, Closure $next): Response
    {
        $workspace = null;

        // 1. Deteksi dari Route Parameter (Akses halaman Edit/View/Delete)
        if ($request->route('workspace')) {
            $workspace = $request->route('workspace');
            if (!$workspace instanceof \App\Models\Workspace) $workspace = \App\Models\Workspace::find($workspace);
        } elseif ($request->route('project')) {
            $project = $request->route('project');
            if (!$project instanceof \App\Models\Project) $project = \App\Models\Project::with('workspace')->find($project);
            $workspace = $project?->workspace;
        } elseif ($request->route('task')) {
            $task = $request->route('task');
            if (!$task instanceof \App\Models\Task) $task = \App\Models\Task::with('project.workspace')->find($task);
            $workspace = $task?->project?->workspace;
        } elseif ($request->route('note')) {
            $note = $request->route('note');
            if (!$note instanceof \App\Models\Note) $note = \App\Models\Note::with('workspace')->find($note);
            $workspace = $note?->workspace;
        }
        // 2. Deteksi dari Form Payload (Aksi Create / Store)
        elseif ($request->has('workspace_id')) {
            $workspace = \App\Models\Workspace::find($request->workspace_id);
        } elseif ($request->has('project_id')) {
            $project = \App\Models\Project::with('workspace')->find($request->project_id);
            $workspace = $project?->workspace;
        }

        // Jika akar Workspace-nya ketemu dan ternyata sedang DI-DISABLE
        if ($workspace && $workspace->is_disabled) {

            // Tangani aksi AJAX (misal: Drag & Drop Kanban atau Fetch API)
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Action denied. The parent workspace has been frozen by the Super Admin.'], 403);
            }

            // Tangani akses halaman biasa
            return redirect()->route('member.workspace.index')
                ->with('error', "Access Denied: The workspace '{$workspace->name}' (and all its projects/tasks) has been frozen.");
        }

        return $next($request);
    }
}
