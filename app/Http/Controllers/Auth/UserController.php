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
        return view('user.configurations', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Verifica se o usuário pode atualizar os próprios dados
        $this->authorize('update', $user);
    
        \Log::info('Updating profile...');
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => [
                'required',
                'string',
                'unique:users,phone,' . $user->id,
                'regex:/^\(\d{2}\)\s\d{5}-\d{4}$/',
            ],
            'birthday' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = preg_replace('/\D/', '', $request->input('phone'));
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
        $user = Auth::user();
    
        $this->authorize('updatePassword', $user);
    
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string',
        ]);
    
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('user.edit-password')->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }
    
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
    
        return redirect()->route('user.edit-password')->with('success', 'Senha atualizada com sucesso!');
    }    
}
