<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['bird_count', 'notes'];
}
