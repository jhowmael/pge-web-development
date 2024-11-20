<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSimulation extends Model
{
    use HasFactory; 

    protected $fillable = [
        'id',
        'user_id',
        'simulation_id',
        'portuguese_score',
        'mathematics_score',
        'logic_reasoning_score',
        'informatics_score',
        'specific_knowledge_score', 
        'general_knowledge_score',
        'science_score',
        'redaction_score',
        'total_score',
        'total_points',
        'status',
        'created_at',
        'updated_at',
    ];
}
