<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserSimulation extends Model
{
    use HasFactory; 

    public function simulation()
    {
        return $this->belongsTo(Simulation::class);  // Assumindo que `simulation_id` é a chave estrangeira
    }

    public function redaction()
    {
        return $this->belongsTo(Redaction::class);  // Assumindo que `simulation_id` é a chave estrangeira
    }

    protected $fillable = [
        'id',
        'user_id',
        'simulation_id',
        'redaction_id',
        'languages_codes_technologies',
        'human_sciences_technologies',
        'natural_sciences_technologies',
        'mathematics_technologies',
        'redaction_score',
        'total_score',
        'total_points',
        'status',
        'started',
        'finished',
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->updateScores($model);
            $model->status = $model->updateStatus($model);
        });

    }

    public function updateScores($entity)
    {
        if($entity->redaction_score != $entity->updateRedactionScore($entity)){
            $entity->redaction_score = $entity->updateRedactionScore($entity);
        }   

        if($entity->languages_codes_technologies != $entity->updateDisciplineScore($entity, 'languages_codes_technologies')){
            $entity->languages_codes_technologies = $entity->updateDisciplineScore($entity, 'languages_codes_technologies');
        }
        
        if($entity->human_sciences_technologies != $entity->updateDisciplineScore($entity, 'human_sciences_technologies')){
            $entity->human_sciences_technologies = $entity->updateDisciplineScore($entity, 'human_sciences_technologies');
        }

        if($entity->natural_sciences_technologies != $entity->updateDisciplineScore($entity, 'natural_sciences_technologies')){
            $entity->natural_sciences_technologies = $entity->updateDisciplineScore($entity, 'natural_sciences_technologies');
        }

        if($entity->mathematics_technologies != $entity->updateDisciplineScore($entity, 'mathematics_technologies')){
            $entity->mathematics_technologies = $entity->updateDisciplineScore($entity, 'mathematics_technologies');
        }

        if($entity->total_score != $entity->updateTotalScore($entity)){
            $entity->total_score = $entity->updateTotalScore($entity);
        }
    }

    public function updateStatus($entity)
    {
        if(empty($entity->started)){
            $entity->started = Carbon::now()->format('Y-m-d H:i:s');
        }

        if(!empty($entity->finished)){
            return 'finished';
        }

        return 'started';
    }
    
    public function updateRedactionScore($entity)
    {
        $redaction = Redaction::where('user_simulation_id', $entity->id)->first();
        
        if(!empty($redaction)){
            return $redaction->score;
        }

        return 0;
    }

    public function updateDisciplineScore($entity, $theme)
    {
        $totalQuestions = UserQuestionResponse::join('questions', 'user_question_responses.question_id', '=', 'questions.id')
            ->where('user_question_responses.user_simulation_id', $entity->id)
            ->where('questions.theme', $theme)
            ->count();
    
        $correctQuestions = UserQuestionResponse::join('questions', 'user_question_responses.question_id', '=', 'questions.id')
            ->where('user_question_responses.user_simulation_id', $entity->id)
            ->where('questions.theme', $theme)
            ->where('user_question_responses.acert', 1)
            ->count();
    
        $averageScore = $totalQuestions > 0 ? ($correctQuestions / $totalQuestions) * 1000 : 0;
        
        return round($averageScore, 2);
    }

    public function updateTotalScore($entity)
    {
        $score = $entity->languages_codes_technologies +
        $entity->human_sciences_technologies +
        $entity->natural_sciences_technologies +
        $entity->mathematics_technologies +
        $entity->redaction_score;

        $totalScore = $score / 5;

        return round($totalScore, 2);

    }
}


