<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

/**
 * Middleware para eliminar espacios en blanco de los valores de las solicitudes.
 *
 * Este middleware elimina los espacios en blanco al inicio y al final de todos
 * los valores de entrada de una solicitud, excepto aquellos que están en la
 * lista de exclusión.
 *
 * @package App\Http\Middleware
 */
class TrimStrings extends Middleware
{
    /**
     * Atributos que no deben ser modificados por el middleware.
     *
     * Algunos campos, como contraseñas, deben conservar los espacios en blanco
     * tal como fueron ingresados por el usuario.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
