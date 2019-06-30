@extends('layouts.TemplateIndex')

@section('container')

    <form class="creaProducto" enctype="multipart/form-data" action="{{ route("productosCRUD",["tipo"=>"CREAR"]) }}" method="post" id="enviaProducto" name="enviaProducto">
        {{ csrf_field() }}
        <label for="NombreProducto" class="input">Nombre del producto: </label>
        <input type="text" name="Nombre_Producto" id="Nombre_Producto" class="input">

        <label for="Precio" class="input">Precio: </label>
        <input type="text" name="Precio" id="Precio" class="input">

        <label for="Existencias" class="input">Existencias: </label>
        <input type="text" name="Existencias" id="Existencias" class="input">

        <div>
        <label for="ImagenProducto" class="input">Subir imagen: </label>
        <label class="nombre" id="NombreImagen" name="NombreImagen">Imagen Producto</label>
        </div>

        <div class="contImagen">
        <div>
            <div>
            <input type="file" name="Imagen_Producto" id="Imagen_Producto" class="input-file">
            <span>Insertar Imagen</span>
            </div>
        </div>
        <img src="/images/png/017-sensible.png" name="visualizaImagen" id="visualizaImagen">
        </div>

        <input type="submit" value="Subir Producto" class="submit">

    </form>

  @endsection

@section('scripts')

    <script src="/js/jquery.validate.js"></script>
    <script src="/js/CreaProducto-script.js"></script>

@endsection
