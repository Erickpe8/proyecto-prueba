<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductosRequest;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
 * Almacena un nuevo producto en la base de datos
 * @function store
 * @param {ProductosRequest} request - Datos validados del producto
 * @returns {RedirectResponse} Redirección a la lista de productos con mensaje flash
 * @success {string} success - Mensaje de éxito: "Producto creado exitosamente."
 * @error {string} error - Mensaje de error: "Hubo un problema al crear el producto: [mensaje de error]"
 * // Redirige a productos.index con mensaje flash
 **/
    public function store(ProductosRequest $request)
    {
    try {
        // Intentar crear el producto
        Producto::create($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    } catch (\Exception $e) {
        // Capturar cualquier error y mostrar un mensaje
        return redirect()->route('productos.index')
            ->with('error', 'Hubo un problema al crear el producto: ' . $e->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductosRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
