<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Redaction;
use App\Models\User;

class RedactionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Redaction $redaction)
    {
        return $user->id === $redaction->user_id;
    }
    
    public function inProgress(User $user, Redaction $redaction)
    {
        return $user->id === $redaction->user_id && $redaction->status === 'in-progress';
    }

    public function finish(User $user, Redaction $redaction)
    {
        return $user->id === $redaction->user_id && $redaction->status === 'in-progress';
    }

    public function disable(User $user, Redaction $redaction)
    {
        return $user->id === $redaction->user_id && $redaction->status === 'in-progress';
    }
}
