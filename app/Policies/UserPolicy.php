<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $targetUser)
    {
        return $user->id === $targetUser->id;
    }

    public function updatePassword(User $user, User $targetUser)
    {
        return $user->id === $targetUser->id;
    }
}
