<?php

namespace App\Http\Controllers\admin\Workspace_Ecosystem;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    /**
     * Menampilkan daftar semua workspace beserta statistik member & project.
     */
    public function index(Request $request)
    {
        // Gunakan withCount untuk performa optimal
        $query = Workspace::with('owner')->withCount(['users', 'projects']);

        // Fitur Pencarian berdasarkan nama workspace atau nama/email owner
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhereHas('owner', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
        }

        $workspaces = $query->latest()->paginate(10);
        $search = $request->search ?? '';

        return view('admin.workspaces.index', compact('workspaces', 'search'));
    }

    /**
     * Membekukan (Disable) atau Mengaktifkan (Enable) sebuah Workspace.
     */
    public function toggleStatus(Workspace $workspace)
    {
        $workspace->is_disabled = !$workspace->is_disabled;
        $workspace->save();

        $status = $workspace->is_disabled ? 'disabled (frozen)' : 'enabled (active)';
        return back()->with('success', "Workspace '{$workspace->name}' has been {$status}.");
    }
}
