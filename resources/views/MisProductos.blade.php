@extends('layouts.TemplateIndex')

@section('container')
    @if ($productosUsuario->isEmpty())
        <div>No ha subido ningun producto</div>
    @else

        <div class="listaProductos">
            @foreach ($productosUsuario as $producto)
                <div class="etiquetasProductos">
                    <label>{{ $producto->id }}</label>
                    <legend>{{ $producto->Nombre_Producto }}</legend>
                    <legend>{{ $producto->Precio }}</legend>
                    <legend>{{ $producto->Existencias }}</legend>
                    <div><img src="{{ "images/ProductoImg/" . $producto->Tienda_Duena->Nombre_Tienda . "/" .  $producto->Imagen_Producto}}"></div>
                    <a href="{{ route("actualizaProducto",["idProducto" => $producto->id]) }}">Actualizar</a>
                    <a>Eliminar</a>
                </div>
            @endforeach
        </div>

    @endif
@endsection
