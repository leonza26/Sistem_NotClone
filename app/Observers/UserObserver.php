<?php
namespace App\Observers;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    // Fungsi ini dipanggil OTOMATIS sesaat setelah user baru tersimpan di database
    public function created(User $user)
    {
        // Jangan kirim notif jika yang dibuat adalah Super Admin
        if ($user->role != 0) {
            $superAdmins = User::where('role', 0)->get();
            if ($superAdmins->count() > 0) {
                Notification::send($superAdmins, new NewUserRegistered($user));
            }
        }
    }
}