<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductosRequest;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $productos = Producto::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(100);

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
            $producto = new Producto();
            $producto->name = $request->input('name');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            $producto->stock = $request->input('stock');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $producto->image = $imageName;
            }

            $producto->save();

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
        $producto = Producto::findOrFail($id);
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
        $producto = Producto::findOrFail($id);
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
        try {
            $producto->update($request->validated());
            return redirect()->route('productos.index')
                ->with('success', 'Producto actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('productos.index')
                ->with('error', 'Error al actualizar el producto: ' . $e->getMessage());
        }
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
        try {
            Producto::findOrFail($id)->delete();
            return redirect()->route('productos.index')
                ->with('success', 'Producto eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('productos.index')
                ->with('error', 'Error al eliminar el producto: ' . $e->getMessage());
        }
    }
}
