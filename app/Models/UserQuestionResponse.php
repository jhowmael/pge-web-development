<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestionResponse extends Model
{
    use HasFactory; 

    public function userQuestionResponse()
    {
        return $this->hasOne(UserQuestionResponse::class)
            ->where('user_id', auth()->id());
    }    

    protected $fillable = [
        'id',
        'user_id',
        'user_simulation_id',
        'question_id',
        'response',
        'acert',
        'created_at',
        'updated_at'
    ];
}
