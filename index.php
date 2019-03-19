﻿<?php

	session_start();

	if(isset($_SESSION['TIENDA'])){

		header("location: Controlador/Productos-Controlador.php");

	}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Tienda Online</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="Styles/index.min.css" />
</head>
<body>

	<div class="contenedorPrincipal">

    <form class="formLogin" action="Modelo/CrearSession.php" method="post" id="LoginForm" name="LoginForm">
        <legend>Iniciar session</legend>
        <span>Nombre Tienda</span>
        <input type="text" placeholder="Nombre Tienda" id="NombreTienda" name="NombreTienda"/>
        <span>Contraseña</span>
        <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena"/>
        <div>
            <input type="submit" value="Acceder" />
        </div>
        <div class="generaRegistro">
        	<label class="legenda">¿No tienes una cuenta? </label>
        	<a href="Controlador/Registro-Controlador.php" class="registro">Registrate Aqui</a>
        </div>

    </form>
	</div>

	<footer class="footer">
		<ul>
			<li><a href="#" class="icon-google"></a><label>Google</label></li>
			<li><a href="#" class="icon-facebook2"></a><label>Facebook</label></li>
			<li><a href="#" class="icon-twitter"></a><label>twitter</label></li>
		</ul>
	</footer>

	<script src="Scripts/jquery-3.3.1.js"></script>
	<script src="Scripts/jquery.validate.js"></script>
	<script src="Scripts/ValidacionIndex.js"></script>
</body>
</html>