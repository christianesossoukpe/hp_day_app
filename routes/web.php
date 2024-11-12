<?php

use App\Http\Controllers\AjouterAmisController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\BirthdaysController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
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


// route user 
// Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/users/{id}',[UserController::class,'getUserById']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');










// routes de gestions d'amis
Route::post('/add-friend', [FriendsController::class, 'sendFriendRequest']);

Route::get('/users/{user_id}/friends', [FriendsController::class, 'getFriends']);//recuperer les amis d'un user donné
Route::get('/users/{user_id}/suggestions', [FriendsController::class, 'suggestFriends']);//suggestions d'amis
Route::get('/users/{user_id}/friends/{friend_id}', [FriendsController::class, 'searchFriends']);
Route::get('/users/{user_id}/friends/{friend_id}', [FriendsController::class, 'sendFriendRequest'])->name('sendFriendRequest');
// Route::get('/users/{user_id}/friends/{friend_id}', [FriendsController::class, 'sendFriendRequest']);
Route::get('/users/{user_id}/friends/{friend_id}/accept', [FriendsController::class, 'acceptFriendRequest']); // Accepter une demande d'amitié

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/ajoutdesamis', [AjouterAmisController::class, 'index'])->name('ajoutdesamis');
// Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('/upcoming-birthdays', [BirthdaysController::class, 'index'])->name('upcoming.birthdays');

// Routes pour l'utilisateur
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/notify', [UserController::class, 'notify'])->name('users.notify');

// Routes pour l'email
Route::get('/users/{user}/email', [EmailsController::class, 'create'])->name('email.create'); // Afficher le formulaire d'envoi
Route::post('/users/{user}/email', [EmailsController::class, 'send'])->name('email.send'); // Envoyer l'email




require __DIR__ . '/auth.php';
