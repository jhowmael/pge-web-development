<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserSimulation;


class UserSimulationFactory extends Factory
{
    protected $model = UserSimulation::class;

    public function definition()
    {
        return [
            'status' => 'started'
        ];
    }
}
