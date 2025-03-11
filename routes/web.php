<?php

use Illuminate\Validation\Rules\Password;   
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;

Route::get('/', [MediaController::class, 'index'])->name('welcome');


// Inscription et connexion
Route::get('/inscription', [InscriptionController::class, 'formulaire']);
Route::post('/inscription', [InscriptionController::class, 'traitement']);

Route::get('/connexion', [ConnexionController::class, 'formulaire']);
Route::post('/connexion', [ConnexionController::class, 'traitement']);

//validation de l'inscription
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Liste des utilisateurs
Route::get('/utilisateur', [UtilisateursController::class, 'liste']);


//liste des médias
//Route::get('/medias', [MediaController::class, 'index']);

Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');
