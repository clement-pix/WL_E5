<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Les groupes de middleware pour les différentes piles de requêtes.
     *
     * - 'web' : utilisé pour les routes classiques (sessions, cookies, CSRF...)
     * - 'api' : utilisé pour les routes de type API (stateless)
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Chiffre les cookies avant stockage
            \App\Http\Middleware\EncryptCookies::class,

            // Ajoute les cookies chiffrés à la réponse
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,

            // Démarre la session (obligatoire pour auth, flash messages, etc.)
            \Illuminate\Session\Middleware\StartSession::class,

            // Active les erreurs de validation via session (optionnel selon besoin)
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // Vérifie le token CSRF pour les formulaires
            \App\Http\Middleware\VerifyCsrfToken::class,

            // Convertit les chaînes vides en null
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ],

        'api' => [
            // Applique un throttling (limitation de requêtes) à l'API
            'throttle:api',

            // Lie automatiquement les paramètres de route aux modèles
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Liste des middlewares utilisables individuellement dans les routes.
     *
     * Exemples :
     * - middleware('auth')
     * - middleware('checkrole:1,3')
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware d'authentification
        'auth' => \App\Http\Middleware\Authenticate::class,

        // Middleware pour les utilisateurs vérifiés par email
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Middleware personnalisé : vérification du rôle utilisateur
        'checkrole' => \App\Http\Middleware\CheckRole::class,

        // (Autres middlewares Laravel standards)
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];
}