<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'workspace_id',
        'user_id',
        'action',
        'target_type',
        'target_id',
        'metadata',
    ];
    // Cast JSON dari database menjadi Array secara otomatis
    protected function casts(): array
    {
        return [
            'metadata' => 'array',
        ];
    }
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi Polymorphic ke model yang diubah (Task/Project/Note dll)
    public function target()
    {
        return $this->morphTo();
    }
}
