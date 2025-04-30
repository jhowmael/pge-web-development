<?php

namespace Database\Factories;

use App\Models\Redaction;
use App\Models\User;
use App\Models\Simulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedactionFactory extends Factory
{
    protected $model = Redaction::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'simulation_id' => Simulation::factory(),
            'theme' => $this->faker->word,
            'type' => $this->faker->word,
            'introduction' => $this->faker->text,
            'redaction_text' => $this->faker->text,
            'status' => 'in-progess', // ou outro status
            // Adicione outros campos necessários para sua redação
        ];
    }
}
