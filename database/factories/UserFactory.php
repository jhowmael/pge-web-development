<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(), // Gera um nome aleatório
            'email' => fake()->unique()->safeEmail(), // Gera um email único
            'email_verified_at' => now(), // Data e hora da verificação do email
            'password' => bcrypt('senha123'), // Senha criptografada
            'remember_token' => Str::random(10), // Gera um token aleatório para 'remember me'
            'phone' => fake()->phoneNumber(), // Gera um número de telefone aleatório
            'birthday' => fake()->date('Y-m-d', '2001-02-01'), // Gera uma data de nascimento aleatória, com base no formato 'Y-m-d'
            'type' => 'studant', // Tipo fixo
            'premium' => 1, // Indica que o usuário é premium (1 para sim)
            'total_points' => 0, // Total de pontos inicializado em 0
            'status' => 'enabled', // Status fixo como "enabled"
            'registered' => now(), // Data e hora de registro
        ];
    }
    

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
