<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Clase User
 *
 * Representa a un usuario autenticable dentro del sistema. Extiende la clase
 * Authenticatable para proporcionar funcionalidades de autenticación en Laravel.
 *
 * @property int $id Identificador único del usuario.
 * @property string $name Nombre del usuario.
 * @property string $email Correo electrónico del usuario.
 * @property string $password Contraseña del usuario (encriptada).
 * @property string|null $remember_token Token de "recuérdame" para sesiones persistentes.
 * @property \Carbon\Carbon|null $email_verified_at Fecha de verificación del correo electrónico.
 * @property \Carbon\Carbon|null $created_at Fecha de creación del registro.
 * @property \Carbon\Carbon|null $updated_at Fecha de última actualización del registro.
 *
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que pueden ser asignados masivamente.
     *
     * Estos atributos pueden ser asignados mediante métodos como `create()` o `fill()`,
     * evitando la necesidad de definirlos individualmente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben estar ocultos en la serialización.
     *
     * Evita que datos sensibles como la contraseña sean expuestos cuando el modelo
     * se convierte en JSON o se serializa.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a otros tipos de datos.
     *
     * Define conversiones automáticas de atributos, como la conversión de fechas y
     * el encriptado de contraseñas.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
