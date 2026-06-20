<?php

namespace App\Http\Controllers\member\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class projectsMainController extends Controller
{
    public function index()
    {
        // Ambil ID semua workspace yang dimiliki atau diikuti user
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();

        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));

        // Ambil project berdasarkan workspace-workspace di atas
        $projects = Project::whereIn('workspace_id', $allWorkspaceIds)->get();

        return view('member.flowral.projects.projects', compact('projects'));
    }
    public function create()
    {
        // User butuh list workspace untuk memilih project ini masuk ke workspace mana
        $ownedWorkspaces = Auth::user()->ownedWorkspaces;
        $memberWorkspaces = Auth::user()->workspaces;
        $workspaces = $ownedWorkspaces->merge($memberWorkspaces);
        if ($workspaces->isEmpty()) {
            return redirect()->route('member.workspace.index')->with('error', 'Silakan buat Workspace terlebih dahulu sebelum membuat Project.');
        }
        return view('member.flowral.projects.create', compact('workspaces'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'workspace_id' => 'required|exists:workspaces,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Project::create([
            'workspace_id' => $request->workspace_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('member.projects')->with('success', 'Project berhasil dibuat!');
    }
    public function edit(Project $project)
    {
        $ownedWorkspaces = Auth::user()->ownedWorkspaces;
        $memberWorkspaces = Auth::user()->workspaces;
        $workspaces = $ownedWorkspaces->merge($memberWorkspaces);
        return view('member.flowral.projects.edit', compact('project', 'workspaces'));
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'workspace_id' => 'required|exists:workspaces,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $project->update([
            'workspace_id' => $request->workspace_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('member.projects')->with('success', 'Project berhasil diupdate!');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('member.projects')->with('success', 'Project berhasil dihapus!');
    }
}
