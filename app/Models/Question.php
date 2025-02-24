<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory; 

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('number');
    }

    protected $fillable = [
        'id',
        'simulation_id',
        'number',
        'correct_alternative', 
        'theme', 
        'enunciation', 
        'image',
        'alternative_a', 
        'alternative_b', 
        'alternative_c', 
        'alternative_d', 
        'alternative_e', 
        'alternative_a_image',
        'alternative_b_image',
        'alternative_c_image',
        'alternative_d_image',
        'alternative_e_image',
        'resolution', 
        'status', 
        'created_at', 
        'updated_at'
    ];
}
