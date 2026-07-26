<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;
    protected $fillable = ['version', 'title', 'content', 'released_at'];
    
    protected $casts = [
        'released_at' => 'date',
    ];
}