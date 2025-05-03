<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Clase base para los controladores en la aplicación.
 * 
 * Esta clase proporciona funcionalidades comunes a todos los controladores,
 * incluyendo autorización de solicitudes y validación de datos.
 * 
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * Habilita la autorización de solicitudes en los controladores que extiendan esta clase.
     */
    use AuthorizesRequests;
    
    /**
     * Habilita la validación de datos en los controladores que extiendan esta clase.
     */
    use ValidatesRequests;
}