@extends('layouts.TemplateIndex')

@section('container')
    {{ Form::open(['method' => 'PUT', 'class'=>'creaProducto','url'=> route("productosCRUD",["idProducto"=>$datosProducto->id,"tipo"=>"ACTUALIZAR"]),"id"=>"enviaProducto","name"=>"enviaProducto",'files' => true ]) }}

        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <label for="NombreProducto" class="input">Nombre del producto: </label>
        <input type="text" name="Nombre_Producto" id="Nombre_Producto" class="input" value="{{ $datosProducto->Nombre_Producto }}">

        <label for="Precio" class="input">Precio: </label>
        <input type="text" name="Precio" id="Precio" class="input" value="{{ $datosProducto->Precio }}">

        <label for="Existencias" class="input">Existencias: </label>
        <input type="text" name="Existencias" id="Existencias" class="input" value="{{ $datosProducto->Existencias }}">

        <div>
        <label for="ImagenProducto" class="input">Subir imagen: </label>
        <label class="nombre" id="NombreImagen" name="NombreImagen">{{ $datosProducto->Imagen_Producto }}</label>
        </div>

        <div class="contImagen">
        <div>
            <div>
            <input type="file" name="Imagen_Producto" id="Imagen_Producto" class="input-file">
            <span>Insertar Imagen</span>
            </div>
        </div>
        <img src="{{ "/images/ProductoImg/" . $datosProducto->Tienda_Duena->Nombre_Tienda . "/" . $datosProducto->Imagen_Producto }}" name="visualizaImagen" id="visualizaImagen">
        </div>

        <input type="submit" value="Subir Producto" class="submit">

    {{ Form::close() }}

  @endsection

@section('scripts')

    <script src="/js/jquery.validate.js"></script>
    <script src="/js/ActualizaProducto-script.js"></script>

@endsection

