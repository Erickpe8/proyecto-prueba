<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

/**
 * Middleware para definir los hosts de confianza en la aplicación.
 *
 * Este middleware especifica qué patrones de host deben ser considerados
 * de confianza por la aplicación. Es útil para mitigar ataques de falsificación
 * de solicitud entre sitios (CSRF) y mejorar la seguridad en entornos de múltiples dominios.
 *
 * @package App\Http\Middleware
 */
class TrustHosts extends Middleware
{
    /**
     * Obtiene los patrones de host que deben ser de confianza.
     *
     * @return array<int, string|null> Lista de patrones de host confiables.
     */
    public function hosts(): array
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
