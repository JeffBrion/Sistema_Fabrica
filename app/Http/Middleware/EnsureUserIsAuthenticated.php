<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            // Redirige a la página de inicio de sesión si no está autenticado
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        return $next($request);
    }
}
