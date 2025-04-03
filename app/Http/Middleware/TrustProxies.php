<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

/**
 * Middleware para definir los proxies de confianza en la aplicación.
 *
 * Este middleware permite especificar qué proxies pueden reenviar solicitudes
 * a la aplicación, garantizando que los encabezados HTTP sean interpretados
 * correctamente y mejorando la seguridad en entornos con balanceadores de carga.
 *
 * @package App\Http\Middleware
 */
class TrustProxies extends Middleware
{
    /**
     * Lista de proxies de confianza para la aplicación.
     *
     * Si se deja en null, la aplicación confiará en todos los proxies.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * Encabezados usados para detectar proxies.
     *
     * Se definen los encabezados HTTP estándar que indican información
     * sobre la solicitud original cuando se usa un proxy o balanceador de carga.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
