<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Simulation;
use App\Models\User;

class SimulationPolicy
{
    use HandlesAuthorization;

    public function start(User $user, Simulation $simulation)
    {
    }

}
