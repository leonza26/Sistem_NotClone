<?php

namespace App\Http\Controllers\member\Search;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalSearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // Ambil semua ID workspace yang bisa diakses user (Owner + Member)
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));
        $projects = collect();
        $tasks = collect();
        $notes = collect();
        if ($q) {
            // Cari Projects
            $projects = Project::whereIn('workspace_id', $allWorkspaceIds)
                ->where(function ($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")->orWhere('description', 'like', "%{$q}%");
                })->get();
            // Cari Tasks
            $tasks = Task::whereHas('project', function ($query) use ($allWorkspaceIds) {
                $query->whereIn('workspace_id', $allWorkspaceIds);
            })->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")->orWhere('description', 'like', "%{$q}%");
            })->get();
            // Cari Notes (Langsung dari Workspace)
            $notes = Note::whereIn('workspace_id', $allWorkspaceIds)
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")->orWhere('content', 'like', "%{$q}%");
                })->get();
        }
        return view('member.flowral.search.index', compact('q', 'projects', 'tasks', 'notes'));
    }
}
