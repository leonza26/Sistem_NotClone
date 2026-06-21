<?php

namespace App\Http\Controllers\member\Workspace;


use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceMemberController extends Controller
{
    public function index(Workspace $workspace)
    {
        // Cek apakah user saat ini tergabung dalam workspace ini
        $currentUser = $workspace->users()->where('user_id', Auth::id())->first();
        if (!$currentUser) {
            abort(403, 'Unauthorized action.');
        }
        $members = $workspace->users;
        $userRole = $currentUser->pivot->role;

        // Hanya owner atau admin yang boleh manage (invite/edit/kick)
        $canManage = in_array($userRole, ['owner', 'admin']);
        return view('member.flowral.workspace.members', compact('workspace', 'members', 'canManage', 'userRole'));
    }
    public function store(Request $request, Workspace $workspace)
    {
        // Cek permission
        $userRole = $workspace->users()->where('user_id', Auth::id())->first()?->pivot->role;
        if (!in_array($userRole, ['owner', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'User dengan email tersebut tidak ditemukan di sistem.',
        ]);
        $userToInvite = User::where('email', $request->email)->first();
        // Cek apakah user sudah ada di workspace
        if ($workspace->users()->where('user_id', $userToInvite->id)->exists()) {
            return redirect()->back()->with('error', 'User tersebut sudah berada di workspace ini.');
        }
        // Tambahkan ke workspace_users sebagai member
        $workspace->users()->attach($userToInvite->id, ['role' => 'member']);
        return redirect()->route('member.workspace.members.index', $workspace)->with('success', 'Member berhasil ditambahkan!');
    }
    public function update(Request $request, Workspace $workspace, User $user)
    {
        // Cek permission
        $userRole = $workspace->users()->where('user_id', Auth::id())->first()?->pivot->role;
        if (!in_array($userRole, ['owner', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'role' => 'required|in:admin,member',
        ]);
        // Cegah mengubah role owner
        $targetUserRole = $workspace->users()->where('user_id', $user->id)->first()?->pivot->role;
        if ($targetUserRole === 'owner') {
            return redirect()->back()->with('error', 'Role Owner tidak dapat diubah.');
        }
        $workspace->users()->updateExistingPivot($user->id, ['role' => $request->role]);
        return redirect()->route('member.workspace.members.index', $workspace)->with('success', 'Role member berhasil diupdate!');
    }
    public function destroy(Workspace $workspace, User $user)
    {
        // Cek permission
        $userRole = $workspace->users()->where('user_id', Auth::id())->first()?->pivot->role;
        if (!in_array($userRole, ['owner', 'admin'])) {
            abort(403, 'Unauthorized action.');
        }
        // Cegah kick owner
        $targetUserRole = $workspace->users()->where('user_id', $user->id)->first()?->pivot->role;
        if ($targetUserRole === 'owner') {
            return redirect()->back()->with('error', 'Owner tidak dapat dihapus dari workspace.');
        }
        $workspace->users()->detach($user->id);
        return redirect()->route('member.workspace.members.index', $workspace)->with('success', 'Member berhasil dihapus dari workspace!');
    }
}
