<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Productos</title>
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
		<div class="tbContenedor">
		 <table class="tbResponsive">
		  <thead>
			<tr>
			  <th>Codigo Producto</th>
			  <th>Nombre del producto</th>
			  <th>Precio</th>
			  <th>Unidades</th>
			</tr>
		  </thead>
		  <tbody>
			  <?php foreach($productos as $datos){ ?>
			<tr>
			  <td><?php echo $datos->CodigoProducto; ?></td>
			  <td><?php echo $datos->NombreProducto; ?></td>
			  <td><?php echo $datos->Precio . "$"; ?></td>
			  <td><?php echo $datos->Existencias; ?></td>
			</tr>
			  <?php } ?>
		  </tbody>
		</table>
		</div>
	</div>
	
	<div class="tgSQLNone" id="mostrarSql">
      <div>
        <label>Sentencias SQL</label>
        <ul>
      	 	<?php  foreach($SQL as $sentencias){
      			echo "<li>" . $sentencias . "</li>";
      		} ?>
        </ul>
      </div>
  	</div>

    <div class="sentenciaSql" id="btnSql">
      <span>SQL</span>
    </div>
	
	<footer class="footer">
		<ul>
			<li><a href="#" class="icon-google"></a><label>Google</label></li>
			<li><a href="#" class="icon-facebook2"></a><label>Facebook</label></li>
			<li><a href="#" class="icon-twitter"></a><label>twitter</label></li>
		</ul>
	</footer>
	
	<script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>
	
</body>
</html>