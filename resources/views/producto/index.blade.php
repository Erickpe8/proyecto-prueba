@extends('layouts.app')

@section('template_title')
    Producto {{-- Título de la página --}}
@endsection


@section('content')
    <div class="container mx-auto p-6"> {{-- Contenedor con margen automático --}}
        <div class="bg-white shadow-lg rounded-lg p-4"> {{-- Tarjeta principal --}}
            <div class="flex justify-between items-center border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-700">Productos</h2>
                <form action="{{ route('productos.index') }}" method="GET" class="mb-4">
                    <div class="flex">
                        <input type="text" name="search" placeholder="Buscar productos..."
                            value="{{ request('search') }}"
                            class="border p-2 rounded w-1/3">
                        
                        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded ml-2 hover:bg-blue-700">
                            Buscar
                        </button>
                    </div>
                </form>
                
                <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black px-4 py-2 rounded">
                    Crear Nuevo
                </a>
            </div>

            {{-- Mensaje de éxito --}}
            @if ($message = Session::get('success'))
                <div class="bg-green-100 text-green-700 p-3 mt-4 rounded">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="mt-4 overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Descripción</th>
                            <th class="px-4 py-2 text-left">Precio</th>
                            <th class="px-4 py-2 text-left">Stock</th>
                            <th class="px-4 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-2">{{ ++$i }}</td>
                                <td class="px-4 py-2">{{ $producto->name }}</td>
                                <td class="px-4 py-2">{{ $producto->descripcion }}</td>
                                <td class="px-4 py-2">{{ $producto->precio }}</td>
                                <td class="px-4 py-2">{{ $producto->stock }}</td>
                                <td class="px-4 py-2 text-center">
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                        <a href="{{ route('productos.show', $producto->id) }}" class="bg-blue-500 text-black px-3 py-1 rounded hover:bg-blue-700">Ver</a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="bg-green-500 text-black px-3 py-1 rounded hover:bg-green-700">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-4">
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
