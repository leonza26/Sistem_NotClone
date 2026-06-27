<?php

namespace App\Http\Controllers\member\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMainController extends Controller
{
    public function index()
    {
        // Dapatkan daftar Workspace ID yang bisa diakses user
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));
        // Ambil Semua Task yang ada di dalam Workspace tersebut
        $tasks = Task::whereHas('project', function ($query) use ($allWorkspaceIds) {
            $query->whereIn('workspace_id', $allWorkspaceIds);
        })->get();
        //Hitung Statistik Task
        $totalTasks = $tasks->count();
        $todoCount = $tasks->where('status', 'todo')->count();
        $todoToday = $tasks->where('status', 'todo')->where('created_at', '>=', now()->startOfDay())->count();
        $inProgressCount = $tasks->where('status', 'in_progress')->count();
        $doneCount = $tasks->where('status', 'done')->count();
        // Hitung persentase untuk Progress Bar UI
        $completionPercentage = $totalTasks > 0 ? round(($doneCount / $totalTasks) * 100) : 0;
        $inProgressPercentage = $totalTasks > 0 ? round(($inProgressCount / $totalTasks) * 100) : 0;
        //  Ambil 4 Task Aktif (Terbaru yang belum selesai)
        $activeTasks = Task::with('project')
            ->whereHas('project', function ($query) use ($allWorkspaceIds) {
                $query->whereIn('workspace_id', $allWorkspaceIds);
            })
            ->whereIn('status', ['todo', 'in_progress'])
            ->latest()
            ->take(4)
            ->get();
        //Ambil 5 Aktivitas Terbaru (Untuk Timeline Kanan)
        $recentActivities = Activity::with('user')
            ->whereIn('workspace_id', $allWorkspaceIds)
            ->latest()
            ->take(5)
            ->get();
        return view('member.flowral.dashboard.index', compact(
            'todoCount',
            'todoToday',
            'inProgressCount',
            'doneCount',
            'totalTasks',
            'completionPercentage',
            'inProgressPercentage',
            'activeTasks',
            'recentActivities'
        ));
    }
}
