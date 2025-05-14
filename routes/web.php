<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateursController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ComposerController;

//
// AUTHENTIFICATION
//

// Formulaire d'inscription
Route::get('/inscription', [InscriptionController::class, 'formulaire']);
Route::post('/inscription', [InscriptionController::class, 'traitement']);

// Formulaire de connexion personnalisé
Route::get('/connexion', [ConnexionController::class, 'formulaire']);
Route::post('/connexion', [ConnexionController::class, 'traitement']);

// Connexion Laravel (utilisée dans certains cas, comme redirection après login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//
// ACCUEIL
//

// Page d'accueil publique avec les médias (carousel)
Route::get('/', [MediaController::class, 'welcome'])->name('welcome');

//
// MÉDIAS (CRUD)
//

// Liste de tous les médias (vue admin ou membre admin)
Route::get('/media', [MediaController::class, 'index'])->name('media.index');

// Formulaire de création de média
Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');

// Enregistrement d'un média
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');

// Suppression d'un média
Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

// Détail d’un média (page individuelle)
Route::get('/media/{id}', [MediaController::class, 'show'])->name('media.show');

//
// AVIS & COMMENTAIRES
//

// Ajout d’un commentaire/avis
Route::post('/media/{media}/comment', [AvisController::class, 'store'])->name('comment.store');

// Formulaire de modification d’un avis
Route::get('/avis/{avis}/edit', [AvisController::class, 'edit'])->name('comment.edit');

// Mise à jour d’un avis existant
Route::put('/avis/{avis}', [AvisController::class, 'update'])->name('comment.update');

//
// DASHBOARDS PAR RÔLE
//

Route::get('/dashboard/superadmin', [DashboardController::class, 'superadmin'])->name('dashboard.superadmin');
Route::get('/dashboard/membreadmin', [DashboardController::class, 'membreadmin'])->name('dashboard.membreadmin');
Route::get('/dashboard/membre', [DashboardController::class, 'membre'])->name('dashboard.membre');

// Redirection dynamique selon le rôle connecté (via Controller index())
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//
// GESTION DES UTILISATEURS (Admin uniquement)
//

// Affiche la liste des utilisateurs
Route::get('/utilisateurs', [UtilisateursController::class, 'index'])->name('users.index');

// Formulaire de modification d’un utilisateur
Route::get('/utilisateurs/{user}/edit', [UtilisateursController::class, 'edit'])->name('users.edit');

// Mise à jour des informations utilisateur
Route::put('/utilisateurs/{user}', [UtilisateursController::class, 'update'])->name('users.update');

// Suppression d’un utilisateur
Route::delete('/utilisateurs/{user}', [UtilisateursController::class, 'destroy'])->name('users.destroy');

//
// LISTE PRIVÉE (Utilisateur connecté)
//

Route::middleware(['auth'])->group(function () {
    // Liste privée du membre
    Route::get('/dashboard/liste-privee', [ComposerController::class, 'index'])->name('liste-privee.index');

    // Ajout d’un média à la liste privée
    Route::post('/dashboard/liste-privee', [ComposerController::class, 'store'])->name('liste-privee.store');

    // Suppression d’un média de la liste privée
    Route::delete('/dashboard/liste-privee/{id_media}', [ComposerController::class, 'destroy'])->name('liste-privee.destroy');

    // Mise à jour de l'avis depuis le dashboard
    Route::put('/dashboard/avis/{id_media}', [AvisController::class, 'update'])->name('avis.update');
});