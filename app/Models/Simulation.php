<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    use HasFactory; // Usar as factories para o modelo, se necessário

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'type',
        'edition',
        'year',
        'minimum_minute',
        'total_duration',
        'quantity_questions',
        'redaction_theme',
        'total_points',
        'description',
        'status',
        'application_date',
    ];

    // Se precisar definir relacionamentos, pode fazê-lo aqui
    // Exemplo:
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}