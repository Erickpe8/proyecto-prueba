<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

/**
 * Middleware para validar la firma de las URLs firmadas en la aplicación.
 *
 * Este middleware se utiliza para asegurar que las solicitudes a rutas protegidas
 * por firma sean legítimas y no hayan sido alteradas, previniendo modificaciones
 * malintencionadas en los parámetros de la URL.
 *
 * @package App\Http\Middleware
 */
class ValidateSignature extends Middleware
{
    /**
     * Lista de parámetros de la cadena de consulta que deben ser ignorados en la validación.
     *
     * Algunos servicios externos, como redes sociales y herramientas de marketing,
     * agregan parámetros a las URLs (por ejemplo, `utm_source`, `fbclid`), que no deben invalidar la firma.
     *
     * @var array<int, string>
     */
    protected $except = [
        // 'fbclid',        // Identificador de clic de Facebook
        // 'utm_campaign',  // Campaña de marketing
        // 'utm_content',   // Contenido específico de la campaña
        // 'utm_medium',    // Medio de marketing (ej. correo, redes sociales)
        // 'utm_source',    // Fuente de tráfico (ej. Google, Facebook)
        // 'utm_term',      // Palabras clave usadas en campañas pagadas
    ];
}
