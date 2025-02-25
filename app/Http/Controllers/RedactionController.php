<?php

namespace App\Http\Controllers;

use App\Models\Redaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedactionController extends Controller
{
    public function inProgress($redactionId)
    {
        $redaction = Redaction::findOrFail($redactionId);
        
        return view('redactions.in-progress', compact('redaction'));
    }
}
