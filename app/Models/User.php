<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserSimulation;
use App\Models\Redaction;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Adicione essa linha
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory; // Adicione o trait aqui

    protected $fillable = [
        'type',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'profile_picture',
        'premium',
        'premium_type',
        'premium_expired_days',
        'remember_token',
        'status',
        'registered',
        'birthday',
        'deleted',
        'created_at',
        'updated_at',
        'total_points'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->updateSimulationScoresFromLastSimulations($model);
            $model->updateRedactionScoresFromLastRedactions($model);
            $model->updateTotalPoints($model);
            //$model->updatePremium($model);
        });
    }

    
    public function updateSimulationScoresFromLastSimulations()
    {
        $lastSimulations = UserSimulation::where('user_id', $this->id)
            ->where('status', 'finished')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
            
        if ($lastSimulations->isEmpty()) {
            return;
        }
    
        // Calcula as médias de cada área
        $avgLanguages = $lastSimulations->avg('languages_codes_technologies');
        $avgHuman = $lastSimulations->avg('human_sciences_technologies');
        $avgNatural = $lastSimulations->avg('natural_sciences_technologies');
        $avgMath = $lastSimulations->avg('mathematics_technologies');
    
        // Atualiza o usuário se for diferente (ou você pode colocar esses valores em outra tabela também)
        $updated = false;
    
        if ($this->simulation_languages_codes_technologies_score != $avgLanguages) {
            $this->simulation_languages_codes_technologies_score = $avgLanguages;
            $updated = true;
        }
    
        if ($this->simulation_human_sciences_technologies_score != $avgHuman) {
            $this->simulation_human_sciences_technologies_score = $avgHuman;
            $updated = true;
        }
    
        if ($this->simulation_natural_sciences_technologies_score != $avgNatural) {
            $this->simulation_natural_sciences_technologies_score = $avgNatural;
            $updated = true;
        }
    
        if ($this->simulation_mathematics_technologies_score != $avgMath) {
            $this->simulation_mathematics_technologies_score = $avgMath;
            $updated = true;
        }
    
        if ($updated) {
            $this->save(); // salva o usuário com as novas médias
        }
    }

    public function updateRedactionScoresFromLastRedactions()
    {
        $lastRedactions = Redaction::where('user_id', $this->id)
            ->whereNotNull('clarity_score')
            ->whereNotNull('spelling_score')
            ->whereNotNull('argumentation_score')
            ->whereNotNull('structure_score')
            ->whereNotNull('cohesion_score')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    
        if ($lastRedactions->isEmpty()) {
            return;
        }
    
        // Calcula médias
        $avgClarity = $lastRedactions->avg('clarity_score');
        $avgSpelling = $lastRedactions->avg('spelling_score');
        $avgArgumentation = $lastRedactions->avg('argumentation_score');
        $avgStructure = $lastRedactions->avg('structure_score');
        $avgCohesion = $lastRedactions->avg('cohesion_score');
    
        $updated = false;
    
        if ($this->redaction_clarity_score != $avgClarity) {
            $this->redaction_clarity_score = $avgClarity;
            $updated = true;
        }
    
        if ($this->redaction_spelling_score != $avgSpelling) {
            $this->redaction_spelling_score = $avgSpelling;
            $updated = true;
        }
    
        if ($this->redaction_argumentation_score != $avgArgumentation) {
            $this->redaction_argumentation_score = $avgArgumentation;
            $updated = true;
        }
    
        if ($this->redaction_structure_score != $avgStructure) {
            $this->redaction_structure_score = $avgStructure;
            $updated = true;
        }
    
        if ($this->redaction_cohesion_score != $avgCohesion) {
            $this->redaction_cohesion_score = $avgCohesion;
            $updated = true;
        }
    
        if ($updated) {
            $this->save();
        }
    }
    
    public function updateTotalPoints()
    {
        $finishedCount = \App\Models\UserSimulation::where('user_id', $this->id)
            ->where('status', 'finished')
            ->count();

        $totalPoints = $finishedCount * 10;

        if ($this->total_points !== $totalPoints) {
            $this->total_points = $totalPoints;
            $this->save();
        }
    }

    public function updatePremium($entity)
    { 
    }
}
