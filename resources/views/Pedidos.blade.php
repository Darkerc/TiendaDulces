@extends('layouts.TemplateIndex')

@section('container')
    <div class="productoPedido">
            <img src="/images/ProductoImg/{{ $productoPedido->Tienda_Duena->Nombre_Tienda ."/". $productoPedido->Imagen_Producto }}">
            <form method="post" action="{{ route("CreaFactura",["idProducto"=>$productoPedido['id']]) }}" id="formProducto" name="formProducto">
                @csrf
                <label>{{ $productoPedido['Nombre_Producto'] }}</label>
                <span>ID: {{ $productoPedido['id'] }}</span>
                <span>Existencas: {{ $productoPedido['Existencias'] }}</span>
                <span>Precio: {{ $productoPedido['Precio'] }}</span>
                <div>
                <label>N.Pedido:</label>
                <label id="pedido" name="pedido"></label>
                <input type="text" name="nPedido" id="nPedido" >
                <button id="aumenta" name="aumenta">+</button>
                <button id="disminuye" name="disminuye">-</button>
                </div>
                <input type="submit" value="Enviar pedido" id="enviaProducto" name="enviaProducto">
            </form>
    </div>
    <label id="contError"></label>
@endsection

@section('scripts')
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/Pedidos-script.js"></script>
@endsection
