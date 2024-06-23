<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Verifica si el usuario está autenticado en el guard actual
            if (Auth::guard($guard)->check()) {
                // Redirige al usuario al HOME definido en RouteServiceProvider si está autenticado
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Si el usuario no está autenticado en ningún guard, continúa con la solicitud normal
        return $next($request);
    }
}