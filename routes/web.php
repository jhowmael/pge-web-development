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
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\UserSimulationController;

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

Route::get('/adminstrative-add-simulations', action: [AdministrativeController::class, 'administrativeAddSimulations'])->name('administrative-add-simulations');

Route::post('/administrative-store-simulations', [AdministrativeController::class, 'administrativeStoreSimulations'])->name('administrative-store-simulations');

Route::get('/administrative-view-simulations/{id}', [AdministrativeController::class, 'administrativeViewSimulations'])->name('administrative-view-simulations');

Route::get('/administrative-edit-simulations/{id}', [AdministrativeController::class, 'administrativeEditSimulations'])->name('administrative-edit-simulations');

Route::post('/administrative-update-simulations/{id}', [AdministrativeController::class, 'administrativeUpdateSimulations'])->name('administrative-update-simulations');

Route::post('/administrative-disable-simulations/{id}', [AdministrativeController::class, 'administrativeDisableSimulations'])->name('administrative-disable-simulations');

Route::post('/administrative-enable-simulations/{id}', [AdministrativeController::class, 'administrativeEnableSimulations'])->name('administrative-enable-simulations');

Route::get('/administrative-filter-simulations', [AdministrativeController::class, 'administrativeFilterSimulations'])->name('administrative-filter-simulations');

Route::get('/administrative-view-questions/{id}', [AdministrativeController::class, 'administrativeViewQuestions'])->name('administrative-view-questions');

Route::get('/administrative-edit-questions/{id}', [AdministrativeController::class, 'administrativeEditQuestions'])->name('administrative-edit-questions');

Route::post('/administrative-update-questions/{id}', [AdministrativeController::class, 'administrativeUpdateQuestions'])->name('administrative-update-questions');

Route::get('/administrative-dashboard-users', [AdministrativeController::class, 'administrativeDashboardUsers'])->name('administrative-dashboard-users');

Route::get('/administrative-edit-users', [AdministrativeController::class, 'administrativeEditUsers'])->name('administrative-edit-users');

Route::get('/administrative-view-users', [AdministrativeController::class, 'administrativeViewUsers'])->name('administrative-view-users');

Route::get('/administrative-disable-users', [AdministrativeController::class, 'administrativeDisableUsers'])->name('administrative-disable-users');

Route::get('/simulations-dashboard', [SimulationController::class, 'simulationsDashboard'])->name('simulations-dashboard');

Route::get('/simulations-start/{id}', [SimulationController::class, 'simulationsStart'])->name('simulations-start');

Route::get('/in-progress/{simulation}/{userSimulation}', [UserSimulationController::class, 'inProgress'])
    ->name('in-progress');

Route::get('/userSimulations/{simulation}/questions/{questionNumber}', [UserSimulationController::class, 'getQuestion'])
    ->middleware('auth')
    ->name('userSimulations.getQuestion');

Route::post('/userSimulations/{userSimulation}/questions/{question}/response', [UserSimulationController::class, 'saveResponse'])
    ->middleware('auth')
    ->name('userSimulations.saveResponse');

    

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