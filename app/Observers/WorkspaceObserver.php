<?php

namespace App\Observers;

use App\Models\Workspace;
use App\Models\User;
use App\Notifications\NewWorkspaceCreated;
use Illuminate\Support\Facades\Notification;

class WorkspaceObserver
{
    // Fungsi ini dipanggil OTOMATIS sesaat setelah workspace baru tersimpan di database
    public function created(Workspace $workspace)
    {
        $superAdmins = User::where('role', 0)->get();
        $owner = User::find($workspace->owner_id);

        if ($superAdmins->count() > 0) {
            Notification::send($superAdmins, new NewWorkspaceCreated($workspace, $owner->name ?? 'Unknown'));
        }
    }
}
