<?php

namespace App\Http\Controllers\member\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request->validate(['content' => 'required|string']);

        $task->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar dihapus!');
    }
}