<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;

#[Fillable(['name', 'email', 'password', 'avatar', 'job_title', 'is_suspended'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, Impersonate;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi user tergabung dalam banyak workspace
    public function workspaces()
    {
        return $this->belongsToMany(Workspace::class, 'workspace_users')
            ->withPivot('role')
            ->withTimestamps();
    }

    // Relasi workspace yang dimiliki oleh user ini (sebagai owner)
    public function ownedWorkspaces()
    {
        return $this->hasMany(Workspace::class, 'owner_id');
    }

    // Relasi task yang di-assign ke user ini
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    // Hanya Super Admin (role 0) yang diizinkan.
    public function canImpersonate(): bool
    {
        return $this->role == 0;
    }

    // Super Admin (role 0) tidak boleh di-impersonate untuk mencegah celah keamanan.
    public function canBeImpersonated(): bool
    {
        return $this->role != 0;
    }
}
