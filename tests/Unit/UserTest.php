<?php

namespace Tests\Unit;

use App\Models\User;
use App\Http\Controllers\Auth\AccessController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_created()
    {
        $userData = [
            'name' => 'João da Silva',
            'email' => 'joao@example.com',
            'password' => 'senha123', 
            'password_confirmation' => 'senha123', 
            'phone' => '13996662857', 
            'birthday' => '2001-02-01',
            'type' => 'studant',
            'premium' => 0,
            'total_points' => 0,
            'status' => 'enabled',
            'registered' => now(),
        ];

        $accessController = new AccessController();
        $accessController->validator($userData)->validate();
        $user = User::create($userData);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'joao@example.com',
        ]);
    }

    /** @test */
    public function it_should_fail_to_create_a_user_with_invalid_data_format()
    {
        $userData = [
            'name' => 'João da Silva',
            'email' => 'invalidemail',  // Email inválido
            'password' => 'senha123',
            'password_confirmation' => 'senha123', // Confirmando a senha
            'phone' => 'aaaaaaaaaa',
            'birthday' => '2001-02-01',
            'type' => 'cliente',
            'premium' => 0,
            'total_points' => 0,
            'status' => 'enabled',
            'registered' => now(),
        ];

        $accessController = new AccessController();        

        $this->expectException(ValidationException::class);
    
        $accessController->validator($userData)->validate();
    }
}
