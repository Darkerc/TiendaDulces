<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Registro</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.min.css" />
</head>
<body>
	<nav class="navegacionPrincipal">
      <ul>
        <li>
          <a href="../Controlador/Comprar-Controlador.php">Comprar</a>
        </li>
        <li>
          <a href="../Controlador/Productos-Controlador.php">Productos</a>
        </li>
        <li>
          <a href="../Modelo/CerrarSession.php">Cerrar Session</a>
        </li>
      </ul>
    </nav>

	<div class="contenedorPrincipal">
		<form class="registroUsuarios" method="post" id="formRegistro" name="formRegistro" action="../Controlador/Index-Controlador.php">
			<legend>Datos del formulario</legend>
			<label>Nombre de la tienda</label>
			<input type="text" placeholder="Nombre Tienda" id="NomTienda" name="NomTienda" />

			<label>Contraseña</label>
			<input type="password" placeholder="Contraseña" id="Contraseña" name="Contraseña" />

			<label>Confirmar contraseña</label>
			<input type="password" placeholder="Confirmar contraseña" id="confContraseña" name="confContraseña" />

			<label>Pais</label>
			<input type="text" placeholder="Pais" id="Pais" name="Pais" />

			<label>Estado</label>
			<input type="text" placeholder="Estado" id="Estado" name="Estado" />

			<label>Colonia</label>
			<input type="text" placeholder="Colonia" id="Colonia" name="Colonia" />

			<label>Encargado</label>
			<input type="text" placeholder="Encargado" id="Encargado" name="Encargado" />

			<div>
				<input type="submit" value="Enviar" />
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

	<script src="../Scripts/jquery-3.3.1.js"></script>
	<script src="../Scripts/jquery.validate.js"></script>
	<script src="../Scripts/Registro-script.js"></script>
</body>
</html>