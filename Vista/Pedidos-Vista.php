<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    	<div class="productoPedido">
	    	<img src="/PagFac/ArchivosSubidos/<?php echo $datosProducto['ImagenProducto']; ?>">
	    	<form method="post" action="../Modelo/CreaFactura.php?CodigoProducto=<?php echo $datosProducto['CodigoProducto'];?>">

  		    	<label><?php echo $datosProducto['NombreProducto'];?></label>
  		    	<span>ID: <?php echo $datosProducto['CodigoProducto'];?></span>
  		    	<span>Existencas: <?php echo $datosProducto['Existencias'];?></span>
  		    	<span>Precio: <?php echo $datosProducto['Precio'] . "$";?></span>
  		    	<div>
  		    		<label>N.Pedido:</label>
  		    		<label id="pedido" name="pedido"></label>
  		    		<input type="number" name="nPedido" id="nPedido" >
  			    	<button id="aumenta" name="aumenta">+</button>
  			    	<button id="disminuye" name="disminuye">-</button>
  		    	</div>
  		      <input type="submit" value="Enviar pedido">
				
	    	</form>
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
        <li>
          <a href="#" class="icon-google"></a>
          <label>Google</label>
        </li>
        <li>
          <a href="#" class="icon-facebook2"></a>
          <label>Facebook</label>
        </li>
        <li>
          <a href="#" class="icon-twitter"></a>
          <label>twitter</label>
        </li>
      </ul>
    </footer>

    <script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script>
    <script src="../Scripts/Pedidos-script.js"></script>
    <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>

  </body>
</html>