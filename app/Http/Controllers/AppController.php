<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppController extends Controller
{
    public function welcome()
    {

        $user = Auth::user();

        return view('app.welcome', compact('user'));
    }

    public function learn()
    {
        return view('app.learn');
    }
}