<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WorkspaceAssigned extends Notification
{
    use Queueable;
    public $workspace;
    public $inviterName;
    public function __construct($workspace, $inviterName)
    {
        $this->workspace = $workspace;
        $this->inviterName = $inviterName;
    }
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function toArray(object $notifiable): array
    {
        return [
            'workspace_id' => $this->workspace->id,
            'project_name' => 'Workspace System',
            'message' => $this->inviterName . ' baru saja mengundang Anda ke Workspace: "' . $this->workspace->name . '"',
            'action_url' => url('/member/workspace') // Arahkan ke halaman utama Workspace
        ];
    }
}
