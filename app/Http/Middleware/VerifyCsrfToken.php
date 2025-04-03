<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * Middleware para verificar tokens CSRF en las solicitudes HTTP.
 *
 * Este middleware protege la aplicación contra ataques de falsificación de solicitud
 * entre sitios (CSRF), asegurando que cada solicitud POST, PUT, PATCH o DELETE
 * incluya un token válido para ser procesada.
 *
 * @package App\Http\Middleware
 */
class VerifyCsrfToken extends Middleware
{
    /**
     * Las URIs que deben estar excluidas de la verificación CSRF.
     *
     * Algunas rutas, como las usadas en APIs o pasarelas de pago, pueden necesitar
     * ser excluidas de la verificación CSRF para evitar conflictos con clientes externos.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Agregar aquí las rutas que deben excluirse de la verificación CSRF.
    ];
}