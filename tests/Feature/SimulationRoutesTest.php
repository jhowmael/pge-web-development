<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Simulation;
use App\Models\UserSimulation;
use App\Models\Redaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SimulationRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function createPremiumUser()
    {
        return User::factory()->create([
            'type' => 'student',
            'premium' => 1,
        ]);
    }

    /** @test */
    public function guest_cannot_access_simulation_routes()
    {
        $response = $this->get(route('simulation.index'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function non_premium_user_cannot_access_simulation_routes()
    {
        $user = User::factory()->create(['premium' => 0]);

        $response = $this->actingAs($user)->get(route('simulation.index'));
        $response->assertForbidden();
    }

    /** @test */
    public function premium_user_can_view_simulations()
    {
        $user = $this->createPremiumUser();
        Simulation::factory()->create();

        $response = $this->actingAs($user)->get(route('simulation.index'));

        $response->assertStatus(200);
        $response->assertViewIs('simulation.index');
        $response->assertViewHas('simulations');
    }

    /** @test */
    public function premium_user_can_start_a_simulation()
    {
        $user = $this->createPremiumUser();
        $simulation = Simulation::factory()->create();

        $response = $this->actingAs($user)->get(route('simulation.start', $simulation->id));

        $this->assertDatabaseHas('user_simulations', [
            'user_id' => $user->id,
            'simulation_id' => $simulation->id,
        ]);

        $userSimulation = UserSimulation::where('user_id', $user->id)
            ->where('simulation_id', $simulation->id)
            ->first();

        $response->assertRedirect(route('userSimulation.in-progress', [
            'simulationId' => $simulation->id,
            'userSimulationId' => $userSimulation->id,
        ]));
    }
}
