@extends('layouts.app') 

{{-- 
    Indica que esta vista extiende el layout principal 'layouts.app', lo que significa 
    que hereda la estructura base definida en dicho layout.
--}}

@section('template_title')
    {{ __('Create') }} Producto
@endsection
{{-- 
    Define el título de la plantilla, que se mostrará en el <title> del documento HTML 
    si se usa en el layout principal.
--}}

@section('content')
    <section class="content container-fluid">
        {{-- Sección principal de contenido con clases de Bootstrap para diseño responsivo --}}

        <div class="row">
            <div class="col-md-12">
                {{-- Contenedor para la tarjeta de creación del producto --}}

                <div class="card card-default">
                    {{-- Tarjeta Bootstrap para mostrar el formulario --}}

                    <div class="card-header">
                        {{-- Encabezado de la tarjeta con el título --}}
                        <span class="card-title">{{ __('Create') }} Producto</span>
                    </div>

                    <div class="card-body bg-white">
                        {{-- Cuerpo de la tarjeta con el formulario --}}

                        <form method="POST" action="{{ route('productos.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            {{-- Token de seguridad de Laravel para evitar ataques CSRF --}}

                            @include('producto.form')
                            {{-- 
                                Se incluye el archivo 'producto.form', que contiene los 
                                campos del formulario reutilizables. Esto permite evitar 
                                duplicación de código entre la vista de creación y edición.
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

