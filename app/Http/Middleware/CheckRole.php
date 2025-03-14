<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Les rôles acceptés sont passés en argument (par exemple: superadmin, membreAdmin).
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Vérifier si l'utilisateur est connecté et si son rôle est dans les rôles autorisés
        if (!$request->user() || !in_array($request->user()->id_role, $roles)) {
            abort(403, 'Accès interdit.');
        }
        return $next($request);
    }
}
