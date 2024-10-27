<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory; 

    public function questions()
    {
        return $this->hasMany(Question::class, 'simulation_id');
    }

    protected $fillable = [
        'id',
        'simulation_id',
        'number',
        'correct_alternative', 
        'theme', 
        'enunciation', 
        'alternative_a', 
        'alternative_b', 
        'alternative_c', 
        'alternative_d', 
        'alternative_e', 
        'resolution', 
        'image',
        'status', 
        'created_at', 
        'updated_at'
    ];
}
