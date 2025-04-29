<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory; // Usar as factories para o modelo, se necessário

    public function questions()
    {
        return $this->hasMany(Question::class, 'simulation_id');
    }

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'type',
        'edition',
        'year',
        'book',
        'lengague',
        'minimum_minute',
        'total_duration',
        'quantity_questions',
        'redaction_theme',
        'primary_image_redaction',
        'secondary_image_redaction',
        'redaction_introduction',
        'total_points',
        'description',
        'status',
        'application_date',
    ];
}
