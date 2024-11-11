<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('guest'); // Protéger la page d'accueil pour les utilisateurs non authentifiés

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->middleware('guest')->name('register'); // Protéger la route d'inscription

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest')->name('login'); // Protéger la route de connexion

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Routes pour l'utilisateur
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/notify', [UserController::class, 'notify'])->name('users.notify');

// Routes pour l'email
Route::get('/users/{user}/email', [EmailsController::class, 'create'])->name('email.create'); // Afficher le formulaire d'envoi
Route::post('/users/{user}/email', [EmailsController::class, 'send'])->name('email.send'); // Envoyer l'email




require __DIR__ . '/auth.php';
