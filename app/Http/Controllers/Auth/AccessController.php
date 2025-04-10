<?php 

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccessController extends Controller
{
    public function showLoginForm()
    {
        return view('web.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/welcome');
        }

        return redirect()->back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        return view('web.forgot-password');
    }

    public function showRegistrationForm()
    {
        return view('web.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        auth()->login($user);

        return view('web.home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:18', 'unique:users'],
            'birthday' => ['required', 'date'],
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $defaultImagePath = public_path('images/studant-default.png');  
        $profilePicturePath = 'profile_pictures/studant-default.png'; 
    
        if (isset($data['profile_picture']) && $data['profile_picture']) {
            $path = $data['profile_picture']->store('profile_pictures', 'public');
        } else {
            if (!file_exists(public_path('storage/' . $profilePicturePath))) {
                if (file_exists($defaultImagePath)) {
                    copy($defaultImagePath, public_path('storage/' . $profilePicturePath));
                } else {
                    throw new \Exception("Imagem padrão não encontrada em $defaultImagePath");
                }
            }
            $path = $profilePicturePath;
        }
    
        $user = User::create([
            'type' => config('users.autoTypeRegister'), 
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
            'status' => config('users.autoStatusRegister'),
            'registered' => now(),
            'profile_picture' => $path, 
        ]);
    
        return $user; 
    }
}
