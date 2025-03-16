<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function welcome()
    {
        return view('app.welcome');
    }

    public function learn()
    {
        return view('app.learn');
    }
}