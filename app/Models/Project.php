<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, RecordsActivity;
    protected $fillable = ['workspace_id', 'name', 'description'];
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
