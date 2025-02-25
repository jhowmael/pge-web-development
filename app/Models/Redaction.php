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
        'created',
        'status',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->status = $model->getStatus($model);
        });

    }

    public function getStatus($entity)
    {
        if(!empty($entity->corrected)){
            return 'corrected';
        }

        return 'in-progress';
    }
}


