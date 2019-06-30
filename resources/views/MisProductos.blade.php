@extends('layouts.TemplateIndex')

@section('container')
    @if ($productosUsuario->isEmpty())
        <div class="sinRegistro">No ha subido ningun producto</div>
    @else
        <div class="tablaProductos">
            <table class="tbResponsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($productosUsuario->isEmpty())
                        <div>No ha subido ningun producto</div>
                    @else
                        @foreach ($productosUsuario as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->Nombre_Producto }}</td>
                                <td>{{ $producto->Precio }}$</td>
                                <td>{{ $producto->Existencias }}</td>
                                <td><a href="{{ route("actualizaProducto",["idProducto"=>$producto->id]) }}" class="actualizar">Actualizar</a></td>
                                <td><a href=" {{ route("productosCRUD",["idProducto"=>$producto->id,"tipo"=>"ELIMINAR"]) }}" class="eliminar">Eliminar</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endif
@endsection


