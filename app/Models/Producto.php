<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Clase Producto
 *
 * Representa un producto dentro del sistema y está vinculada a la base de datos
 * mediante Eloquent, el ORM de Laravel.
 *
 * @property int $id Identificador único del producto.
 * @property string $name Nombre del producto.
 * @property string $descripcion Descripción del producto.
 * @property float $precio Precio del producto.
 * @property int $stock Cantidad disponible en inventario.
 * @property \Carbon\Carbon|null $created_at Fecha de creación del registro.
 * @property \Carbon\Carbon|null $updated_at Fecha de última actualización del registro.
 *
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    use HasFactory;
    /**
     * Número de elementos por página para la paginación.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Atributos que pueden ser asignados masivamente.
     *
     * Estos atributos se pueden asignar de manera masiva mediante métodos como
     * `create()` o `fill()`, evitando la necesidad de especificarlos individualmente.
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'descripcion', 'precio', 'stock', 'image'];
}
