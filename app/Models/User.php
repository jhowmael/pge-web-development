<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'type',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'profile_picture',
        'premium',
        'remember_token',
        'status',
        'registered',
        'birthday',
        'deleted',
        'created_at',
        'updated_at',
        'total_points'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
