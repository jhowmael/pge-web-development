<?php 

namespace Database\Factories;

use App\Models\Simulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimulationFactory extends Factory
{
    protected $model = Simulation::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'year' => $this->faker->year,
            'minimum_minute' => $this->faker->numberBetween(10, 60),
            'total_duration' => $this->faker->numberBetween(10, 300),
            'quantity_questions' => $this->faker->numberBetween(10, 90),
            'redaction_theme' => $this->faker->word,
            'redaction_introduction' =>  $this->faker->text,
            'total_points' =>  $this->faker->numberBetween(100, 1000),
            'description' =>  $this->faker->text,
            'status' =>  'enabled',
        ];
    }
}
