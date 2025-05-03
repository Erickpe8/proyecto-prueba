<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware para redirigir a los usuarios autenticados.
 *
 * Este middleware verifica si un usuario ya está autenticado en alguno de los
 * guardias especificados. Si es así, lo redirige a la página de inicio definida
 * en `RouteServiceProvider::HOME`. En caso contrario, permite que la solicitud
 * continúe su curso normal.
 *
 * @package App\Http\Middleware
 */
class RedirectIfAuthenticated
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request  La solicitud HTTP actual.
     * @param  \Closure  $next  La siguiente acción en la cadena de middleware.
     * @param  string  ...$guards  Los guardias de autenticación a comprobar.
     * @return \Symfony\Component\HttpFoundation\Response  La respuesta HTTP resultante.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
