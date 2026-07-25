<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewWorkspaceCreated extends Notification
{
    use Queueable;
    public $workspace;
    public $ownerName;

    public function __construct($workspace, $ownerName)
    {
        $this->workspace = $workspace;
        $this->ownerName = $ownerName;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_workspace',
            'title' => 'New Workspace Created',
            'message' => 'Workspace "' . $this->workspace->name . '" was created by ' . $this->ownerName,
            'icon' => 'domain',
            'color' => 'emerald',
            'url' => route('admin.workspaces.index')
        ];
    }
}
