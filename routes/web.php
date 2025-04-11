<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\AccessController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\UserSimulationController;
use App\Http\Controllers\RedactionController;

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/contact', [WebController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [WebController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/help', [WebController::class, 'help'])->name('help');
Route::get('/plans', [WebController::class, 'plans'])->name('plans');

Route::get('/login', [AccessController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AccessController::class, 'login']);
Route::get('/forgot-password', [AccessController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/register', [AccessController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AccessController::class, 'register'])->name('register');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logout');


Route::get('/welcome', [AppController::class, 'welcome'])->middleware('auth', 'is.premium')->name('welcome');
Route::get('/learn', [AppController::class, 'learn'])->middleware('auth', 'is.premium')->name('learn');

Route::prefix('user')->middleware(['auth', 'is.premium'])->group(function () {
    Route::get('/configurations', [UserController::class, 'configurations'])->name('user.configurations');
    Route::post('/profile-update', [UserController::class, 'update'])->name('user.update');
    Route::get('/edit-password', [UserController::class, 'editPassword'])->name('user.edit-password');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');
});

Route::prefix('administrative')->middleware(['auth', 'is.admin', 'is.premium'])->group(function () {
    Route::get('/', [AdministrativeController::class, 'dashboard'])->name('administrative.dashboard');
    Route::get('/dashboard-simulations', [AdministrativeController::class, 'dashboardSimulations'])->name('administrative.dashboard-simulations');
    Route::get('/add-simulations', [AdministrativeController::class, 'addSimulations'])->name('administrative.add-simulations');
    Route::post('/store-simulations', [AdministrativeController::class, 'storeSimulations'])->name('administrative.store-simulations');
    Route::get('/view-simulations/{id}', [AdministrativeController::class, 'viewSimulations'])->name('administrative.view-simulations');
    Route::get('/edit-simulations/{id}', [AdministrativeController::class, 'editSimulations'])->name('administrative.edit-simulations');
    Route::post('/update-simulations/{id}', [AdministrativeController::class, 'updateSimulations'])->name('administrative.update-simulations');
    Route::post('/disable-simulations/{id}', [AdministrativeController::class, 'disableSimulations'])->name('administrative.disable-simulations');
    Route::post('/enable-simulations/{id}', [AdministrativeController::class, 'enableSimulations'])->name('administrative.enable-simulations');
    Route::get('/filter-simulations', [AdministrativeController::class, 'filterSimulations'])->name('administrative.filter-simulations');
    Route::get('/view-questions/{id}', [AdministrativeController::class, 'viewQuestions'])->name('administrative.view-questions');
    Route::get('/edit-questions/{id}', [AdministrativeController::class, 'editQuestions'])->name('administrative.edit-questions');
    Route::post('/update-questions/{id}', [AdministrativeController::class, 'updateQuestions'])->name('administrative.update-questions');
    Route::get('/dashboard-users', [AdministrativeController::class, 'dashboardUsers'])->name('administrative.dashboard-users');
    Route::get('/filter-users', [AdministrativeController::class, 'filterUsers'])->name('administrative.filter-users');
    Route::get('/view-users{id}', [AdministrativeController::class, 'viewUsers'])->name('administrative.view-users');
    Route::get('/disable-users{id}', [AdministrativeController::class, 'disableUsers'])->name('administrative.disable-users');
});

Route::prefix('simulation')->middleware(['auth', 'is.premium'])->group(function () {
    Route::get('/', [SimulationController::class, 'index'])->name('simulation.index');
    Route::get('/start/{id}', [SimulationController::class, 'start'])->name('simulation.start');
});

Route::prefix('userSimulation')->middleware(['auth', 'is.premium'])->group(function () {
    Route::get('/', [UserSimulationController::class, 'index'])->name('userSimulation.index');
    Route::get('/in-progress/{simulationId}/{userSimulationId}', [UserSimulationController::class, 'inProgress'])->name('userSimulation.in-progress');
    Route::post('/finish/{userSimulationId}', [UserSimulationController::class, 'finish'])->name('userSimulation.finish');
    Route::get('/view/{id}', [UserSimulationController::class, 'view'])->name('userSimulation.view');
});

Route::get('/userSimulations/{simulation}/questions/{questionNumber}', [UserSimulationController::class, 'getQuestion'])->middleware('auth', 'is.premium')->name('userSimulations.getQuestion');
Route::post('/userSimulations/{userSimulation}/questions/{question}/response', [UserSimulationController::class, 'saveResponse'])->middleware('auth', 'is.premium')->name('userSimulations.saveResponse');

Route::prefix('redaction')->middleware(['auth', 'is.premium'])->group(function () {
    Route::get('/', [RedactionController::class, 'index'])->name('redaction.index');
    Route::get('/view{id}', [RedactionController::class, 'view'])->name('redaction.view');
    Route::get('/in-progress/{redactionId}', [RedactionController::class, 'inProgress'])->name('redaction.in-progress');
    Route::post('/finish/{redactionId}', [RedactionController::class, 'finish'])
    ->middleware(['auth', 'throttle:10,1,auth:id']) // Limite de 10 requisições por 1 minuto por usuário
    ->name('redaction.finish');
});



