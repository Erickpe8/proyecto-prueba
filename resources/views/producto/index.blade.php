@extends('layouts.app')

@section('template_title')
    Producto {{-- Título de la página --}}
@endsection

@section('content')
    <div class="container-fluid"> {{-- Contenedor principal con diseño fluido --}}
        <div class="row">
            <div class="col-sm-12"> {{-- Ocupa el ancho completo en pantallas pequeñas y mayores --}}
                <div class="card">
                    <div class="card-header">
                        {{-- Encabezado de la tarjeta con título y botón de creación --}}
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Producto') }} {{-- Título de la tarjeta --}}
                            </span>

                            <div class="float-right">
                                {{-- Botón para crear un nuevo producto --}}
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Mensaje de éxito si la operación se realizó correctamente --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive"> {{-- Hace la tabla adaptable a pantallas pequeñas --}}
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Acciones</th> {{-- Columna para los botones de acción --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iteramos sobre la lista de productos --}}
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td> {{-- Contador automático --}}
                                            <td>{{ $producto->name }}</td>
                                            <td>{{ $producto->descripcion }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>{{ $producto->stock }}</td>
                                            <td>
                                                {{-- Formulario con acciones de ver, editar y eliminar --}}
                                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('productos.show', $producto->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit', $producto->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Paginación de los productos --}}
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
