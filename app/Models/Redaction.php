<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Redaction extends Model
{
    use HasFactory; 

    protected $fillable = [
        'id',
        'user_id',
        'simulation_id',
        'user_simulation_id',
        'type',
        'theme',
        'total_points',
        'score',
        'text',
        'image',
        'correction',
        'status',
    ];

    protected static function booted()
    {
        static::saving(function ($model) { 
        });

    }
}


