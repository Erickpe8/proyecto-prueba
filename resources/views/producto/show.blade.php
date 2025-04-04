@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? __('Show') . " " . __('Producto') }} 
    {{-- Título de la página. Si no hay nombre, muestra "Show Producto" --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- Encabezado de la tarjeta con título y botón de regreso --}}
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            {{-- Botón para regresar a la lista de productos --}}
                            <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        {{-- Sección para mostrar la información del producto --}}
                    
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $producto->name }}
                        </div>
                    
                        <div class="form-group mb-2 mb20"> 
                            <strong>Descripción:</strong>
                            {{ $producto->descripcion }}
                        </div>
                    
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            ${{ $producto->precio }}
                        </div>
                    
                        <div class="form-group mb-2 mb20">
                            <strong>Stock:</strong>
                            {{ $producto->stock }}
                        </div>
                    
                        <div class="form-group mb-2 mb20">
                            <strong>Imagen:</strong><br>
                            @if ($producto->image)
                                <img src="{{ asset('images/' . $producto->image) }}" alt="Imagen del producto" width="150" class="img-thumbnail mt-2">
                            @else
                                <p class="text-muted">Sin imagen</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
