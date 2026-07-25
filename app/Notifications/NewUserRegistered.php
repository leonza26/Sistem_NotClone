<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database']; // Hanya kirim ke lonceng aplikasi (tabel notifications)
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_user',
            'title' => 'New User Registration',
            'message' => $this->user->name . ' (' . $this->user->email . ') has joined Flowral.',
            'icon' => 'person_add',
            'color' => 'blue',
            'url' => route('admin.users.index') // Link menuju halaman User Management 
        ];
    }
}
