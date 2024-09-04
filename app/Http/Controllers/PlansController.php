<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function plans()
    {
        return view('plans');
    }
}
