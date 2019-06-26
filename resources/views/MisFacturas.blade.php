@extends('layouts.TemplateIndex')

@section('container')

<div class="muestraFactura">
        @if ($facturasTienda->isEmpty())
            <div>No se ha realizado ninguna compra</div>
        @else
            <div class="tituloFactura">Facturas de: {{ $facturasTienda[0]->Tienda_Duena->Nombre_Tienda }}</div>
            <ul class="listaFacturas">
                @foreach($facturasTienda as $factura)
                    <li class="itemFactura">
                    <a target="_blank" class="link" href="{{ route('VerFactura',["idFactura"=>$factura->id]) }}">
                        <button class="impFactura" id="btnImprimir">Imprimir</button>
                    </a>
                    <label for="btnImprimir" class="lbFactura">
                        <span class="folio">Folio #{{ $factura->id }}</span>
                        <span>Dia: {{ $factura->Fecha_Compra->format('d') }}</span>
                        <span>Mes: {{ $factura->Fecha_Compra->format('m') }} </span>
                        <span>Año: {{ $factura->Fecha_Compra->format('y') }}</span>
                        <legend> {{ $factura->Producto->Nombre_Producto }}</legend>
                    </label>
                    </li>
                @endforeach
            </ul>
        @endif
</div>

@endsection
