<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Redaction::class => \App\Policies\RedactionPolicy::class,
        \App\Models\Simulation::class => \App\Policies\SimulationPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\UserSimulation::class => \App\Policies\UserSimulationPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
