<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\HomeController;

// TELAS INICIAIS

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/plans', [PlansController::class, 'index'])->name('plans');


/*
//--------------------------------------------

// TELAS DO CLIENTE

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