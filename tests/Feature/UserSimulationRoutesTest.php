<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Simulation;
use App\Models\UserSimulation;
use App\Models\Redaction;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSimulationRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function createPremiumUser()
    {
        return User::factory()->create([
            'type' => 'student',
            'premium' => 1,
        ]);
    }

    protected function setupSimulationData($user)
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

        return compact('simulation', 'userSimulation', 'redaction');
    }

    /** @test */
    public function premium_user_can_access_user_simulation_index()
    {
        $user = $this->createPremiumUser();

        $response = $this->actingAs($user)->get(route('userSimulation.index'));

        $response->assertStatus(200);
        $response->assertViewIs('userSimulation.index');
        $response->assertViewHas('userSimulations');
    }

    /** @test */
    public function premium_user_can_view_specific_user_simulation()
    {
        $user = $this->createPremiumUser();
        extract($this->setupSimulationData($user));

        $response = $this->actingAs($user)->get(route('userSimulation.view', $userSimulation->id));

        $response->assertStatus(200);
        $response->assertViewIs('userSimulation.view');
        $response->assertViewHasAll(['userSimulation', 'redaction']);
    }

    /** @test */
    public function premium_user_can_access_in_progress_simulation()
    {
        $user = $this->createPremiumUser();
        extract($this->setupSimulationData($user));

        $response = $this->actingAs($user)->get(route('userSimulation.in-progress', [
            'simulationId' => $simulation->id,
            'userSimulationId' => $userSimulation->id,
        ]));

        $response->assertStatus(200);
        $response->assertViewIs('userSimulation.in-progress');
        $response->assertViewHasAll(['simulation', 'userSimulation', 'questions']);
    }

    /** @test */
    public function premium_user_can_finish_simulation()
    {
        $user = $this->createPremiumUser();
        extract($this->setupSimulationData($user));

        $response = $this->actingAs($user)->post(route('userSimulation.finish', $userSimulation->id));

        $response->assertRedirect(route('redaction.in-progress', [
            'redactionId' => $userSimulation->redaction_id,
        ]));
    }
}
