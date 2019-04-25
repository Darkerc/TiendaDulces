<?php

  require_once("../Modelo/VerificarSesion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pedidos</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
          <a href="../Controlador/CreaProducto-Controlador.php">Crear Producto</a>
        </li>
        <li>
          <a href="../Modelo/CerrarSession.php">Cerrar Session</a>
        </li>
      </ul>
    </nav>

    <div class="contenedorPrincipal">
        <div class="avisoFactura">
            <label>
                Pedido realizado: factura generada
            </label>
            <a href="../Controlador/VerFactura-Controlador.php" target="_blank">
                imprimir factura
            </a>
        </div>
    </div>
    
    <footer class="footer">
		<ul>
			<li><a href="#" class="icon-google"></a><label>Google</label></li>
			<li><a href="#" class="icon-facebook2"></a><label>Facebook</label></li>
			<li><a href="#" class="icon-twitter"></a><label>twitter</label></li>
		</ul>
	</footer>


</body>
</html>