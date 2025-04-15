<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Redaction;
use App\Models\UserSimulation;
use App\Models\Simulation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedactionRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function createPremiumUser()
    {
        return User::factory()->create();
    }
    
    protected function createRedactionForUser($user)
    {
        $simulation = Simulation::factory()->create();
    
        $userSimulation = UserSimulation::factory()->create([
            'user_id' => $user->id,
            'simulation_id' => $simulation->id,
        ]);
    
        $redaction = Redaction::factory()->create([
            'user_id' => $user->id,
            'simulation_id' => $simulation->id,
            'user_simulation_id' => $userSimulation->id,
        ]);

        $userSimulation->redaction_id = $redaction->id;
        $userSimulation->save(); 
    
        return $redaction;
    }
    
    /** @test */
    public function premium_user_can_access_redaction_index()
    {
        $user = $this->createPremiumUser();

        $response = $this->actingAs($user)->get(route('redaction.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_view_a_specific_redaction()
    {
        $user = $this->createPremiumUser();
        $redaction = $this->createRedactionForUser($user);

        $response = $this->actingAs($user)->get(route('redaction.view', $redaction->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_access_in_progress_redaction()
    {
        $user = $this->createPremiumUser();
        $redaction = $this->createRedactionForUser($user);

        $response = $this->actingAs($user)->get(route('redaction.in-progress', $redaction->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_finish_redaction()
    {
        $user = $this->createPremiumUser();
        $redaction = $this->createRedactionForUser($user);

        $response = $this->actingAs($user)->post(route('redaction.finish', $redaction->id), [
            'text' => str_repeat('Texto da redação. ', 10) // mínimo de 100 caracteres
        ]);

        $response->assertRedirect(route('userSimulation.view', ['id' => $redaction->user_simulation_id]));
    }

    /** @test */
    public function unauthenticated_users_cannot_access_redaction_routes()
    {
        $user = $this->createPremiumUser();
        $redaction = $this->createRedactionForUser($user);

        $this->get(route('redaction.index'))->assertRedirect('/login');
        $this->get(route('redaction.view', $redaction->id))->assertRedirect('/login');
        $this->get(route('redaction.in-progress', $redaction->id))->assertRedirect('/login');
        $this->post(route('redaction.finish', $redaction->id))->assertRedirect('/login');
    }
}
