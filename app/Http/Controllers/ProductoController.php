<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductosRequest;

/**
 * @class ProductoController
 * @description Controlador para gestionar productos
 */
class ProductoController extends Controller
{
    /**
     * @function index
     * @description Muestra una lista paginada de productos
     * @returns {View} Vista con la lista de productos
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * @function create
     * @description Muestra el formulario para crear un nuevo producto
     * @returns {View} Vista del formulario de creación de productos
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * @function store
     * @description Almacena un nuevo producto en la base de datos
     * @param {ProductosRequest} request - Datos validados del producto
     * @returns {RedirectResponse} Redirección a la lista de productos con mensaje flash
     * @success {string} success - Mensaje de éxito: "Producto creado exitosamente."
     * @error {string} error - Mensaje de error: "Hubo un problema al crear el producto: [mensaje de error]"
     */
    public function store(ProductosRequest $request)
    {
        try {
            Producto::create($request->validated());

            return redirect()->route('productos.index')
                ->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('productos.index')
                ->with('error', 'Hubo un problema al crear el producto: ' . $e->getMessage());
        }
    }

    /**
     * @function show
     * @description Muestra los detalles de un producto específico
     * @param {int} id - ID del producto a mostrar
     * @returns {View} Vista con los detalles del producto
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * @function edit
     * @description Muestra el formulario de edición de un producto
     * @param {int} id - ID del producto a editar
     * @returns {View} Vista del formulario de edición del producto
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * @function update
     * @description Actualiza los datos de un producto en la base de datos
     * @param {ProductosRequest} request - Datos validados del producto
     * @param {Producto} producto - Instancia del producto a actualizar
     * @returns {RedirectResponse} Redirección a la lista de productos con mensaje flash
     * @success {string} success - Mensaje de éxito: "Producto actualizado exitosamente."
     */
    public function update(ProductosRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * @function destroy
     * @description Elimina un producto de la base de datos
     * @param {int} id - ID del producto a eliminar
     * @returns {RedirectResponse} Redirección a la lista de productos con mensaje flash
     * @success {string} success - Mensaje de éxito: "Producto eliminado exitosamente."
     */
    public function destroy($id)
    {
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
