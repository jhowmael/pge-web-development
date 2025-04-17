<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{

    public function home()
    {
        return view('web.home');
    }

    public function about()
    {
        return view('web.about');
    }

    public function help()
    {
        return view('web.help');
    }

    public function blog()
    {
        return view('web.blog');
    }

    public function plans()
    {
        return view('web.plans');
    }

    public function signMonthly(Request $request)
    {
        $user = auth()->user(); 

        $user->premium_expired_days = 30; 
        $user->premium = 1; 
        $user->premium_type = 'monthly'; 
        $user->save();

        return redirect()->back()->with('success', 'Assinatura mensal ativa!');
    }

    public function signSemiAnnual(Request $request)
    {
        $user = auth()->user(); 

        $user->premium_expired_days = 180; 
        $user->premium = 1; 
        $user->premium_type = 'semi_annual'; 
        $user->save();

        return redirect()->back()->with('success', 'Assinatura semestral ativa!');
    }

    public function showContactForm()
    {
        return view('web.contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        // Exemplo simples de envio de e-mail
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('destinatario@example.com')
                    ->subject('Mensagem de Contato de ' . $request->name)
                    ->from($request->email);
        });

        return redirect()->route('web.contact')->with('success', 'Mensagem enviada com sucesso!');
    }
}