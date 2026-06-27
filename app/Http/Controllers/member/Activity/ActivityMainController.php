<?php

namespace App\Http\Controllers\member\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityMainController extends Controller
{
    public function activity(Request $request)
    {
        $ownedWorkspaceIds = Auth::user()->ownedWorkspaces()->pluck('id')->toArray();
        $memberWorkspaceIds = Auth::user()->workspaces()->pluck('workspaces.id')->toArray();
        $allWorkspaceIds = array_unique(array_merge($ownedWorkspaceIds, $memberWorkspaceIds));
        // 1. Ambil Query Dasar Activity
        $query = \App\Models\Activity::with('user')
            ->whereIn('workspace_id', $allWorkspaceIds);
        // 2. Logika FILTER Berdasarkan Modul (Tasks, Notes, Projects)
        $filter = $request->query('filter');
        if ($filter === 'tasks') {
            $query->where('target_type', 'App\Models\Task');
        } elseif ($filter === 'notes') {
            $query->where('target_type', 'App\Models\Note');
        } elseif ($filter === 'projects') {
            $query->where('target_type', 'App\Models\Project');
        }
        // 3. PAGINATION (Batasi 5 aktivitas per halaman)
        $paginatedActivities = $query->latest()->paginate(5)->withQueryString();
        // 4. GROUPING Data Khusus di Halaman Ini Saja
        $activities = $paginatedActivities->groupBy(function ($activity) {
            if ($activity->created_at->isToday()) return 'Today';
            if ($activity->created_at->isYesterday()) return 'Yesterday';
            return $activity->created_at->format('F j, Y');
        });
        // 5. Analytics "Weekly Pulse"
        $weeklyActivities = \App\Models\Activity::whereIn('workspace_id', $allWorkspaceIds)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();
        $stats = [
            'total'    => $weeklyActivities->count(),
            'tasks'    => $weeklyActivities->where('target_type', 'App\Models\Task')->count(),
            'notes'    => $weeklyActivities->where('target_type', 'App\Models\Note')->count(),
            'projects' => $weeklyActivities->where('target_type', 'App\Models\Project')->count(),
        ];
        // Lempar variabel baru ke View
        return view('member.flowral.activity.index', compact('activities', 'stats', 'paginatedActivities', 'filter'));
    }
}
