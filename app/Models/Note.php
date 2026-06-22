<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'workspace_id',
        'parent_id',
        'title',
        'content',
        'icon',
        'cover_image',
    ];
    // Relasi ke Workspace
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    // Relasi Parent (Note utama/folder)
    public function parent()
    {
        return $this->belongsTo(Note::class, 'parent_id');
    }
    // Relasi Children (Sub-notes di dalam note ini)
    public function children()
    {
        return $this->hasMany(Note::class, 'parent_id')->with('children'); // Recursive relationship untuk nested notes
    }
}
