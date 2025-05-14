<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Intercepte une requête entrante pour vérifier le rôle de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request   La requête HTTP en cours
     * @param  \Closure  $next                     Le prochain middleware ou la requête finale
     * @param  mixed  ...$roles                    Liste des rôles autorisés (peut contenir plusieurs ID)
     * @return mixed
     *
     * Exemple d'utilisation dans une route :
     * Route::get('/admin', function () { ... })->middleware('checkrole:1,3');
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Vérifie si un utilisateur est connecté et que son id_role est autorisé
        if (!$request->user() || !in_array($request->user()->id_role, $roles)) {
            abort(403, 'Accès interdit.'); // Refus d'accès en cas d'échec
        }

        // Si tout est valide, continuer l'exécution de la requête
        return $next($request);
    }
}