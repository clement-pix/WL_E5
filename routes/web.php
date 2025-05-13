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

// Inscription et connexion
Route::get('/inscription', [InscriptionController::class, 'formulaire']);
Route::post('/inscription', [InscriptionController::class, 'traitement']);

Route::get('/connexion', [ConnexionController::class, 'formulaire']);
Route::post('/connexion', [ConnexionController::class, 'traitement']);

// Validation de l'inscription (login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Page d'accueil avec la liste publique des médias
Route::get('/', [MediaController::class, 'welcome'])->name('welcome');

// Création et ajout de média
Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');
Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

// Détail d'un média
Route::get('/media/{id}', [MediaController::class, 'show'])->name('media.show');

// Commentaires/avis du média
Route::post('/media/{media}/comment', [AvisController::class, 'store'])->name('comment.store');

// Modification du commentaire et avis
Route::get('/avis/{avis}/edit', [AvisController::class, 'edit'])->name('comment.edit');
Route::put('/avis/{avis}', [AvisController::class, 'update'])->name('comment.update');

// Tableaux de bord spécifiques aux rôles
Route::get('/dashboard/superadmin', [DashboardController::class, 'superadmin'])->name('dashboard.superadmin');
Route::get('/dashboard/membreadmin', [DashboardController::class, 'membreadmin'])->name('dashboard.membreadmin');
Route::get('/dashboard/membre', [DashboardController::class, 'membre'])->name('dashboard.membre');

// Vérification du rôle pour rediriger vers le bon dashboard
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->id_role === 1) {
        return redirect()->route('dashboard.superadmin');
    } elseif ($user->id_role === 3) {
        return redirect()->route('dashboard.membreadmin');
    } elseif ($user->id_role === 2) {
        return redirect()->route('dashboard.membre');
    }
    abort(403, 'Accès interdit');
})->middleware('auth')->name('dashboard');

    // Liste des utilisateurs
    Route::get('/utilisateurs', [UtilisateursController::class, 'index'])->name('users.index');
    
    // Formulaire d'édition d'un utilisateur
    Route::get('/utilisateurs/{user}/edit', [UtilisateursController::class, 'edit'])->name('users.edit');
    
    // Mise à jour d'un utilisateur
    Route::put('/utilisateurs/{user}', [UtilisateursController::class, 'update'])->name('users.update');
    
    // Suppression d'un utilisateur
    Route::delete('/utilisateurs/{user}', [UtilisateursController::class, 'destroy'])->name('users.destroy');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard/liste-privee', [ComposerController::class, 'index'])->name('liste-privee.index');
        Route::post('/dashboard/liste-privee', [ComposerController::class, 'store'])->name('liste-privee.store');
        Route::delete('/dashboard/liste-privee/{id_media}', [ComposerController::class, 'destroy'])->name('liste-privee.destroy');
    
        Route::put('/dashboard/avis/{id_media}', [AvisController::class, 'update'])->name('avis.update');
    });