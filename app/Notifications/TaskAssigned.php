<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssigned extends Notification
{
    use Queueable;
    public $task;
    /**
     * Create a new notification instance.
     */
    public function __construct($task)
    {
        $this->task = $task;
    }
    /**
     * Kita hanya menggunakan 'database' agar notifikasi muncul di web.
     * (Bisa ditambah 'mail' jika nanti ingin kirim email).
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    /**
     * Data yang akan disimpan ke tabel notifications
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'project_name' => $this->task->project->name ?? 'Project',
            'message' => 'Anda ditugaskan pada Task: ' . ($this->task->title ?? $this->task->name),
            'action_url' => url('/member/tasks/' . $this->task->id) // Sesuaikan dengan route detail task Anda nanti
        ];
    }
}
