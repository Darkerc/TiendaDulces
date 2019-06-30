@extends('layouts.TemplateIndex')

@section('container')
    @csrf
        <div class="contenedorProductos">
            @if ($productosTiendas->isEmpty())
            <div class="sinRegistro">No existen productos disponibles para comprar</div>
            @else
                @foreach ($productosTiendas as $producto)
                <a href="{{ route("Pedidos", ["idProducto" => $producto->id]) }}">
                    <legend>
                        {{ $producto->Nombre_Producto  }}
                    </legend>
                    <label>
                        {{ $producto->Precio  }}
                    </label>
                    <span>
                        {{ $producto->Existencias  }} Existencias
                    </span>
                    <img src="/images/ProductoImg/{{ $producto->Tienda_Duena->Nombre_Tienda ."/". $producto->Imagen_Producto }}" />
                </a>
                @endforeach
            @endif
        </div>
@endsection
