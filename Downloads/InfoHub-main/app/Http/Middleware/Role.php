<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role  Le rôle requis
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Vérifier si l'utilisateur est authentifié
        if ($request->user()->role !== $role) {
            return redirect('dashboard'); // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
        }

       

        return $next($request); // Permet de passer à la requête suivante si l'utilisateur a le rôle requis
    }
}
