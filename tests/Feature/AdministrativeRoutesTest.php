<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdministrativeRoutesTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(array $attributes = [])
    {
        return User::factory()->create(array_merge([], $attributes));
    }

    /** @test */
    public function non_authenticated_users_are_redirected_from_admin_routes()
    {
        $response = $this->get('/administrative');
        $response->assertRedirect('/login'); // ou a rota do seu login
    }

    /** @test */
    public function non_admin_users_are_forbidden_from_accessing_admin_routes()
    {
        $user = $this->createUser(['premium' => 1, 'type' => 'studant']); // não é admin
        $response = $this->actingAs($user)->get('/administrative');
        $response->assertForbidden();
    }

    /** @test */
    public function non_premium_admin_users_are_forbidden_from_accessing_admin_routes()
    {
        $user = $this->createUser(['premium' => 0, 'type' => 'admin']); // admin mas não premium
        $response = $this->actingAs($user)->get('/administrative');
        $response->assertForbidden();
    }

    /** @test */
    public function admin_premium_users_can_access_admin_routes()
    {
        $user = $this->createUser(['premium' => 1, 'type' => 'admin']);
        $response = $this->actingAs($user)->get('/administrative');
        $response->assertOk(); // ou assertStatus(200)
    }
}
