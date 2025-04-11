<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'type',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'profile_picture',
        'premium',
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
            $model->updateSimulationScores($model);
            //$model->updateRedactionScores($model);
            //$model->updatePremium($model);
        });
    }

    
    public function updateSimulationScores($entity)
    {
        if($entity->simulation_languages_codes_technologies_score != $entity->updateLanguagesCodesTechnologiesScore($entity)){
            
        }   

        if($entity->simulation_human_sciences_technologies_score != $entity->updateHumanSciencesTechnologiesScore($entity)){
            
        }   

        if($entity->simulation_natural_sciences_technologies_score != $entity->updateNaturalSciencesTechnologiesScore($entity)){
            
        }   

        if($entity->simulation_mathematics_technologies_score != $entity->updateMathematicsTechnologiesScore($entity)){
            
        }   
    }
    
    public function updateLanguagesCodesTechnologiesScore($entity)
    { 
    }
    
    public function updateHumanSciencesTechnologiesScore($entity)
    { 
    }
    
    public function updateNaturalSciencesTechnologiesScore($entity)
    { 
    }
    
    public function updateMathematicsTechnologiesScore($entity)
    { 
    }

    public function updateRedactionScores($entity)
    {
        if($entity->redaction_clarity_score != $entity->updateRedactionClarityScore($entity)){
            
        }   

        if($entity->redaction_spelling_score != $entity->updateRedactionSpellingScore($entity)){
            
        }   

        if($entity->redaction_argumentation_score != $entity->updateRedactionArgumentationScore($entity)){
            
        }   

        if($entity->redaction_structure_score != $entity->updateRedactionStructureScore($entity)){
            
        }   

        if($entity->redaction_cohesion_score != $entity->updateRedactionCohesionScore($entity)){
            
        }  
    }

    public function updateRedactionClarityScore($entity)
    { 
    }

    public function updateRedactionSpellingScore($entity)
    { 
    }

    public function updateRedactionArgumentationScore($entity)
    { 
    }

    public function updateRedactionStructureScore($entity)
    { 
    }

    public function updateRedactionCohesionScore($entity)
    { 
    }


    public function updatePremium($entity)
    { 
    }
}
