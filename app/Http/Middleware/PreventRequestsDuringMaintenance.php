<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

/**
 * Middleware para prevenir solicitudes durante el modo de mantenimiento.
 *
 * Este middleware permite definir qué URIs deben ser accesibles mientras
 * la aplicación está en mantenimiento.
 *
 * @package App\Http\Middleware
 */
class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Las URIs que deben ser accesibles cuando el modo de mantenimiento está activado.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Agregar aquí las rutas accesibles durante el mantenimiento.
    ];
}
