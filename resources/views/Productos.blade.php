@extends('layouts.TemplateIndex')

@section('container')
    <div class="tbContenedor">
        <table class="tbResponsive">
            <thead>
                <tr>
                    <th>Codigo Producto</th>
                    <th>Nombre del producto</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->Nombre_Producto }}</td>
                    <td>{{ $producto->Precio }}$</td>
                    <td>{{ $producto->Existencias }} Existencias</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

