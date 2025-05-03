@extends('layouts.app') 

{{-- 
    Extiende el layout principal 'layouts.app', lo que permite reutilizar la estructura 
    base de la aplicación y mantener una apariencia uniforme en todas las vistas.
--}}

@section('template_title')
    {{ __('Update') }} Producto
@endsection
{{-- 
    Define el título de la plantilla, que se mostrará en el <title> del documento HTML 
    si es utilizado en el layout principal.
--}}

@section('content')
    <section class="content container-fluid">
        {{-- Sección principal del contenido con clases de Bootstrap para diseño responsivo --}}

        <div class="">
            <div class="col-md-12">
                {{-- Contenedor principal de la tarjeta de edición del producto --}}

                <div class="card card-default">
                    {{-- Tarjeta Bootstrap para mostrar el formulario de actualización --}}

                    <div class="card-header">
                        {{-- Encabezado de la tarjeta con el título de actualización --}}
                        <span class="card-title">{{ __('Update') }} Producto</span>
                    </div>

                    <div class="card-body bg-white">
                        {{-- Cuerpo de la tarjeta donde se encuentra el formulario --}}

                        <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{-- 
                                Método HTTP PATCH, utilizado para actualizar parcialmente un recurso en Laravel.
                                Se indica explícitamente para que Laravel lo procese correctamente.
                            --}}
                            @csrf
                            {{-- Token de seguridad de Laravel para evitar ataques CSRF --}}

                            @include('producto.form')
                            {{-- 
                                Se incluye la vista 'producto.form', que contiene los campos del formulario 
                                reutilizables tanto para la creación como para la edición de productos.
                            --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- 
    Finaliza la sección 'content', que será insertada en el layout base en el 
    lugar donde se encuentre @yield('content'). 
--}}
