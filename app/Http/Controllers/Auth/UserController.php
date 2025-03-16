<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function configurations()
    {
        $user = Auth::user();
        // Renderiza a view para configuração de perfil
        return view('user.configurations', compact('user'));
    }

    public function update(Request $request)
    {
        \Log::info('Updating profile...');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'birthday' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        \Log::info('Profile updated successfully.');

        return redirect()->route('user.configurations')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function editPassword()
    {
        return view('user.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string',
        ]);

        $user = Auth::user();

        // Verificar se a senha atual está correta
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('user.edit-password')->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }

        // Atualizar a senha
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('user.edit-password')->with('success', 'Senha atualizada com sucesso!');
    }
}
