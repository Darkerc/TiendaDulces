@extends('layouts.TemplateIndex')

@section('container')
    <form class="formLogin" action="{{ route("acceso") }}" method="POST">
        {{ csrf_field() }}
        <legend>Iniciar session</legend>
        <span>Nombre Tienda</span>
        <input type="text" placeholder="Nombre Tienda" id="Nombre_Tienda" name="Nombre_Tienda"/>
        <span>Contraseña</span>
        <input type="password" placeholder="Contraseña" id="Contrasena" name="Contrasena"/>
        <div>
            <input type="submit" value="Acceder" />
        </div>
        <div class="generaRegistro">
        <label class="legenda">¿No tienes una cuenta? </label>
        <a href="{{ route("Registro") }}" class="registro">Registrate Aqui</a>
        </div>
    </form>
@endsection




