<div class="row padding-1 p-1">
    {{-- Fila con padding para la distribución del formulario --}}

    <div class="col-md-12">
        {{-- Columna que ocupa todo el ancho disponible en pantallas medianas y grandes --}}

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="row padding-1 p-1">
                {{-- Fila con padding para la distribución del formulario --}}
            
                <div class="col-md-12">
                    {{-- Columna que ocupa todo el ancho disponible en pantallas medianas y grandes --}}
            
                    <!-- Campo para el Nombre del Producto -->
                    <div class="form-group mb-2 mb20">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $producto?->name) }}" id="name" placeholder="Name">
                        {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
            
                    <!-- Campo para la Descripción del Producto -->
                    <div class="form-group mb-2 mb20">
                        <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
                        <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" 
                               value="{{ old('descripcion', $producto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
                        {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
            
                    <!-- Campo para el Precio del Producto -->
                    <div class="form-group mb-2 mb20">
                        <label for="precio" class="form-label">{{ __('Precio') }}</label>
                        <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" 
                               value="{{ old('precio', $producto?->precio) }}" id="precio" placeholder="Precio">
                        {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
            
                    <!-- Campo para el Stock del Producto -->
                    <div class="form-group mb-2 mb20">
                        <label for="stock" class="form-label">{{ __('Stock') }}</label>
                        <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                               value="{{ old('stock', $producto?->stock) }}" id="stock" placeholder="Stock">
                        {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
            
                    <!-- Campo para la imagen del producto-->
                    <div class="form-group mb-2 mb20">
                        <label for="image" class="form-label">{{ __('Imagen') }}</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" 
                               id="image" accept="image/*">
                        {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>
            
                <!-- Botón de envío del formulario -->
                <div class="col-md-12 mt20 mt-2">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
        
</div>
