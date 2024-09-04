<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;

// TELAS INICIAIS

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/plans', [PlansController::class, 'plans'])->name('plans');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redireciona para a página inicial após o logout
})->name('logout');

//--------------------------------------------

// TELAS DO CLIENTE


Route::get('/welcome', [WelcomeController::class, 'welcome'])->middleware('auth')->name('welcome');



/*

Route::get('/profile', function () {
    return view('perfil');
});

Route::get('/signature', function () {
    return view('assinatura');
});

Route::get('/simulations', function () {
    return view('simulados');
});

Route::get('/historic-simulations', function () {
    return view('historico-simulados');
});

Route::get('/redactions', function () {
    return view('redacoes');
});

Route::get('/historic-redactions', function () {
    return view('historico-redacoes');
});

//--------------------------------------------

// TELAS DOS COLABORADORES

Route::get('/simulations', function () {
    return view('simulados');
});

Route::get('/redactions', function () {
    return view('redacoes');
});

Route::get('/students', function () {
    return view('estudantes');
});

//--------------------------------------------

*/