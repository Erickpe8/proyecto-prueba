<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Producto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductFeatureTest extends TestCase
{
    use RefreshDatabase;

/** @test */
public function puede_crear_un_producto_con_datos_validos()
{
    // Realiza la solicitud POST para crear un producto con los datos proporcionados
    $respuesta = $this->post(route('productos.store'), [
        'name' => 'Producto de prueba',
        'descripcion' => 'Descripción de prueba',
        'precio' => 2000,
        'stock' => 10,
    ]);

    // Verifica que la redirección sea correcta
    $respuesta->assertRedirect(route('productos.index'));

    // Busca el producto en la base de datos
    $producto = \App\Models\Producto::where('name', 'Producto de prueba')->first();
    $this->assertNotNull($producto, 'El producto no fue guardado en la base de datos');

    // Verifica que los datos del producto estén correctamente guardados
    $this->assertEquals('Producto de prueba', $producto->name, 'El nombre del producto no coincide');
    $this->assertEquals('Descripción de prueba', $producto->descripcion, 'La descripción del producto no coincide');
    $this->assertEquals(2000, $producto->precio, 'El precio del producto no coincide');
    $this->assertEquals(10, $producto->stock, 'El stock del producto no coincide');
}

/** @test */
public function puede_actualizar_un_producto_existente()
{
    // Comprueba que se pueda editar un producto y que los cambios se guarden
    $producto = Producto::factory()->create();

    $respuesta = $this->put(route('productos.update', $producto), [  
        'name' => 'Nuevo nombre',
        'descripcion' => 'Nueva descripción',
        'precio' => 9900,
        'stock' => 25,
    ]);

    $respuesta->assertRedirect(route('productos.index'));  

    $this->assertDatabaseHas('productos', [  
        'id' => $producto->id,
        'name' => 'Nuevo nombre',
        'descripcion' => 'Nueva descripción',
        'precio' => 9900,
        'stock' => 25,
    ]);
}

//** @test */
public function puede_eliminar_un_producto_y_su_imagen()
{
    Storage::fake('public');

    $imagen = UploadedFile::fake()->image('producto.jpg');

    $this->post(route('productos.store'), [  
        'name' => 'Producto para eliminar',
        'descripcion' => 'Texto',
        'precio' => 1500,
        'stock' => 3,
        'imagen' => $imagen,
    ]);

    $producto = Producto::first();

    // Verifica que la imagen se haya guardado
    $this->assertTrue(
        Storage::disk('public')->exists($producto->imagen),
        'La imagen no fue encontrada en el almacenamiento simulado.'
    );

    $respuesta = $this->delete(route('productos.destroy', $producto));  

    $respuesta->assertRedirect(route('productos.index'));  

    $this->assertDatabaseMissing('productos', ['id' => $producto->id]);  

    // Verifica que la imagen haya sido eliminada
    $this->assertFalse(
        Storage::disk('public')->exists($producto->imagen),
        'La imagen aún existe en el almacenamiento después de eliminar el producto.'
    );
}

/** @test */
public function muestra_errores_si_faltan_campos_al_crear()
{
    // Verifica que el sistema muestre errores si se intenta crear un producto sin datos
    $respuesta = $this->post(route('productos.store'), []);  

    $respuesta->assertSessionHasErrors(['name', 'descripcion', 'precio', 'stock']);
}

/** @test */
public function muestra_errores_si_faltan_campos_al_actualizar()
{
    // Verifica que no se puedan guardar cambios si faltan datos al editar
    $producto = Producto::factory()->create();

    $respuesta = $this->put(route('productos.update', $producto), []);  

    $respuesta->assertSessionHasErrors(['name', 'descripcion', 'precio', 'stock']);
}

}
