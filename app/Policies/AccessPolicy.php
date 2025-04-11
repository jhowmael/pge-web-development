<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Access;
use App\Models\User;

class AccessPolicy
{
    use HandlesAuthorization;
}
