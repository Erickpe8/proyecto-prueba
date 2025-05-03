<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

/**
 * Middleware para cifrar las cookies de la aplicación.
 *
 * Este middleware cifra automáticamente todas las cookies enviadas en la respuesta,
 * excepto las que se encuentran en la lista de exclusión.
 *
 * @package App\Http\Middleware
 */
class EncryptCookies extends Middleware
{
    /**
     * Los nombres de las cookies que no deben ser cifradas.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Agregar aquí las cookies que no se deben cifrar.
    ];
}
