@extends('layouts.TemplateIndex')

@section('container')
    {{-- {!! Form::open(['url' => '/Productos','method' => 'post','action' => 'TiendaController@index']) !!} --}}
    <form class="registroUsuarios" method="POST" action="{{ route("crear") }}" id="formRegistro">
        {{ csrf_field() }}
        <legend>Datos del formulario</legend>
        <label>Nombre de la tienda</label>
        <input type="text" placeholder="Nombre Tienda" id="Nombre_Tienda" name="Nombre_Tienda" />

        <label>Contraseña</label>
        <input type="password" placeholder="Contraseña" id="Contrasena" name="Contrasena" />

        <label>Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar contraseña" id="confContraseña" name="confContraseña" />

        <label>Encargado</label>
        <input type="text" placeholder="Encargado" id="Encargado" name="Encargado" />

        <label>Pais</label>
        <input type="text" placeholder="Pais" id="Pais" name="Pais" />

        <label>Estado</label>
        <input type="text" placeholder="Estado" id="Estado" name="Estado" />

        <label>Colonia</label>
        <input type="text" placeholder="Colonia" id="Colonia" name="Colonia" />

        <div>
            <input type="submit" value="Enviar" />
        </div>
    </form>
    {{-- {!! Form::close() !!} --}}
@endsection

@section("scripts")

    <script src="/js/jquery.validate.js"></script>
    <script src="/js/Registro-script.js"></script>

@endsection
