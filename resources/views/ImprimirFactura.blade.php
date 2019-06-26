@extends('layouts.TemplateIndex')

@section('container')
<div class="avisoFactura">
        <label>
            Pedido realizado: factura generada
        </label>
        <a href="../Controlador/VerFactura-Controlador.php" target="_blank">
            imprimir factura
        </a>
    </div>
@endsection
