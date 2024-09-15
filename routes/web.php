<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\AdministrativeController;

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



Route::get('/profile', function () {
    return view('perfil');
});


Route::get('/profile-configurations', [ProfileController::class, 'profileConfigurations'])->middleware('auth')->name('profile-configurations');
Route::post('/profile-update', [ProfileController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

Route::get('/profile-edit-password', [ProfileController::class, 'profileEditPassword'])
    ->middleware('auth')
    ->name('profile-edit-password');

Route::post('/profile-update-password', [ProfileController::class, 'updateProfilePassword'])
    ->middleware('auth')
    ->name('profile.update-password');

Route::get('/administrative-dashboard', [AdministrativeController::class, 'administrativeDashboard'])->name('administrative-dashboard');

Route::get('/adminstrative-dashboard-simulations', [AdministrativeController::class, 'administrativeDashboardSimulations'])->name('administrative-dashboard-simulations');

Route::get('/adminstrative-add-simulations', [AdministrativeController::class, 'administrativeAddSimulations'])->name('administrative-add-simulations');

Route::get('/administrative-edit-simulations', [AdministrativeController::class, 'administrativeEditSimulations'])->name('administrative-edit-simulations');

Route::get('/administrative-disabled-simulations', [AdministrativeController::class, 'administrativeDisabledSimulations'])->name('administrative-disabled-simulations');

Route::get('/administrative-delete-simulations', [AdministrativeController::class, 'administrativeDeleteSimulations'])->name('adminstrative-disabled-simulations');

Route::get('/administrative-dashboard-users', [AdministrativeController::class, 'administrativeDashboardUsers'])->name('administrative-dashboard-users');

Route::get('/administrative-edit-users', [AdministrativeController::class, 'administrativeEditUsers'])->name('administrative-edit-users');

Route::get('/administrative-view-users', [AdministrativeController::class, 'administrativeViewUsers'])->name('administrative-view-users');

Route::get('/administrative-disable-users', [AdministrativeController::class, 'administrativeDisableUsers'])->name('administrative-disable-users');


/*


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