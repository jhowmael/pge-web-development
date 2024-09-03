<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
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

        return redirect()->route('contact')->with('success', 'Mensagem enviada com sucesso!');
    }
}
