<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'media_type',
        'media_paths',
    ];

    protected $casts = [
        'media_paths' => 'array',
    ];
}
