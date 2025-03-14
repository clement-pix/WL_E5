<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Les groupes de middleware de votre application.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Liste des middlewares pour le groupe "web"
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // ... autres middlewares web
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Les middlewares de route de votre application.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'checkrole' => \App\Http\Middleware\CheckRole::class,
        // Ajoutez ici d'autres middlewares de route si nécessaire
        'auth' => \App\Http\Middleware\Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // etc.
    ];
}
