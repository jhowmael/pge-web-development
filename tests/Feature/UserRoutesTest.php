<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class UserRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function createPremiumUser()
    {
        return User::factory()->create([
            'name' => 'João da Silva',
            'email' => 'joao@example.com',
            'password' => bcrypt('senha123'),
            'phone' => '13996662857',
            'birthday' => '2001-02-01',
            'type' => 'cliente',
            'premium' => 1,
            'total_points' => 0,
            'status' => 'enabled',
            'registered' => now(),
        ]);
    }

    protected function createNormalUser()
    {
        return User::factory()->create([
            'name' => 'João da Silva',
            'email' => 'joao@example.com',
            'password' => bcrypt('senha123'),
            'phone' => '13996662857',
            'birthday' => '2001-02-01',
            'type' => 'cliente',
            'premium' => 0,
            'total_points' => 0,
            'status' => 'enabled',
            'registered' => now(),
        ]);
    }

    /** @test */
    public function premium_user_can_access_settings()
    {
        $user = $this->createPremiumUser();
        $response = $this->actingAs($user)->get(route('user.configurations'));
        $response->assertStatus(200);
    }

    /** @test */
    public function non_premium_user_is_redirected()
    {
        $user = $this->createNormalUser();
        $response = $this->actingAs($user)->get(route('user.configurations'));
        $response->assertStatus(403); // ou redirect, depende do seu middleware
    }

    /** @test */
    public function unauthenticated_visitor_cannot_access_protected_routes()
    {
        $response = $this->get(route('user.configurations'));
        $response->assertRedirect('/login'); // ou a rota que sua auth manda
    }

    /** @test */
    public function premium_user_can_update_profile()
    {
        $user = $this->createPremiumUser();
        $response = $this->actingAs($user)->post(route('user.update'), [
            'name' => 'Nome Atualizado',
            'phone' => '(11) 99999-9999',
            'email' => 'joao_updated@example.com',
            'birthday' => '2001-02-01',
        ]);
        // Verifique se o usuário foi redirecionado para a página de configurações
        $response->assertRedirect(route('user.configurations'));
        // Verifique se o banco de dados contém os dados atualizados
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Nome Atualizado',
            'email' => 'joao_updated@example.com',
            'phone' => '11999999999',  // Telefone armazenado sem caracteres especiais
        ]);
    }

    /** @test */
    public function premium_user_can_edit_password()
    {
        $user = $this->createPremiumUser();
        $response = $this->actingAs($user)->get(route('user.edit-password'));
        $response->assertStatus(200);
    }

    /** @test */
    public function premium_user_can_update_password()
    {
        $user = $this->createPremiumUser();
        $response = $this->actingAs($user)->post(route('user.update-password'), [
            'current_password' => 'senha123',
            'password' => 'novaSenha123',
            'password_confirmation' => 'novaSenha123',
        ]);
        $response->assertRedirect(); // depende da sua lógica
    }
}
