<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Middleware para manejar la autenticación de usuarios.
 *
 * Esta clase extiende el middleware de autenticación de Laravel y define
 * el comportamiento cuando un usuario no autenticado intenta acceder a una ruta protegida.
 *
 * @package App\Http\Middleware
 */
class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta a la que el usuario debe ser redirigido si no está autenticado.
     *
     * @param  \Illuminate\Http\Request  $request  La solicitud HTTP actual.
     * @return string|null  La ruta de redirección o null si la solicitud espera JSON.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
