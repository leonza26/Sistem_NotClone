<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskCommented extends Notification
{
    use Queueable;
    public $task;
    public $commenterName;
    public function __construct($task, $commenterName)
    {
        $this->task = $task;
        $this->commenterName = $commenterName;
    }
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'project_name' => $this->task->project->name ?? 'Task Discussion',
            'message' => $this->commenterName . ' membalas di diskusi Task: "' . $this->task->title . '"',
            'action_url' => url('/member/tasks/' . $this->task->id) // Arahkan kembali ke halaman detail Task
        ];
    }
}
