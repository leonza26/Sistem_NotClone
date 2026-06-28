<?php

namespace App\Http\Controllers\member\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteMainController extends Controller
{
    // Menampilkan halaman utama notes
    public function notes()
    {
        $ownedWorkspaces = Auth::user()->ownedWorkspaces;
        $memberWorkspaces = Auth::user()->workspaces;
        $workspaces = $ownedWorkspaces->merge($memberWorkspaces);
        // Load hanya root notes (parent_id = null), sisanya akan ter-load recursive otomatis berkat relasi children()
        $workspaces->load(['notes' => function ($query) {
            $query->whereNull('parent_id')->orderBy('created_at', 'asc');
        }]);
        return view('member.flowral.notes.index', compact('workspaces'));
    }
    // Membuat note/sub-note baru
    public function store(Request $request)
    {
        $request->validate([
            'workspace_id' => 'required|exists:workspaces,id',
            'parent_id' => 'nullable|exists:notes,id',
            'title' => 'required|string|max:255',
        ]);
        $note = Note::create([
            'workspace_id' => $request->workspace_id,
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            // Struktur JSON kosong default untuk Editor.js
            'content' => json_encode(['time' => time(), 'blocks' => [], 'version' => '2.28.0']),
        ]);
        return response()->json($note);
    }
    // Mengambil data note (untuk di-load ke editor)
    public function show(Note $note)
    {
        return response()->json($note);
    }
    // Menyimpan perubahan (Auto-save content / Update title)
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'icon' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);
        $note->update($validated);
        return response()->json($note);
    }
    // Menghapus note (beserta sub-notenya karena ada cascadeOnDelete di database)
    public function destroy(Note $note)
    {
        // (Pengecekan akses biarkan saja seperti sebelumnya)
        if ($note->workspace->owner_id !== auth()->id() && !$note->workspace->members->contains(auth()->id())) {
            abort(403, 'Unauthorized action.');
        }
        $note->delete();
        // UBAH BAGIAN INI: Agar saat modal global mengeksekusi form, layarnya refresh kembali ke halaman semula
        return back()->with('success', 'Document deleted successfully.');
    }
}
