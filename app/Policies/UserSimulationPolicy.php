<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\UserSimulation;
use App\Models\User;

class UserSimulationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, UserSimulation $userSimulation)
    {
        return $user->id === $userSimulation->user_id;
    }


    public function inProgress(User $user, UserSimulation $userSimulation)
    {
        return $user->id === $userSimulation->user_id && $userSimulation->status === 'started'; 
    }

    public function finish(User $user, UserSimulation $userSimulation)
    {
        return $user->id === $userSimulation->user_id && $userSimulation->status === 'started';
    }
}
