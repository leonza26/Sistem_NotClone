<?php

namespace App\Http\Controllers\member\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceMainController extends Controller
{
    public function index()
    {
        // Ambil SEMUA workspace di mana user tergabung (baik sebagai Owner, Admin, maupun Member)
        $workspaces = Auth::user()->workspaces;
        return view('member.flowral.workspace.index', compact('workspaces'));
    }
    public function create()
    {
        return view('member.flowral.workspace.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $workspace = Workspace::create([
            'name' => $request->name,
            'owner_id' => Auth::id(),
        ]);
        // Masukkan pembuat ke tabel pivot sebagai owner
        $workspace->users()->attach(Auth::id(), ['role' => 'owner']);
        return redirect()->route('member.workspace.index')->with('success', 'Workspace berhasil dibuat!');
    }
    public function edit(Workspace $workspace)
    {
        if ($workspace->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('member.flowral.workspace.edit', compact('workspace'));
    }
    public function update(Request $request, Workspace $workspace)
    {
        if ($workspace->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $workspace->update([
            'name' => $request->name,
        ]);
        return redirect()->route('member.workspace.index')->with('success', 'Workspace berhasil diupdate!');
    }
    public function destroy(Workspace $workspace)
    {
        if ($workspace->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $workspace->delete();
        return redirect()->route('member.workspace.index')->with('success', 'Workspace berhasil dihapus!');
    }
}
