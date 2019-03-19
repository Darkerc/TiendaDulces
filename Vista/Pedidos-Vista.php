<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Pedidos</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.min.css" />
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
          <a href="../Modelo/CerrarSession.php">Cerrar Session</a>
        </li>
      </ul>
    </nav>

    <div class="contenedorPrincipal">
    	<div class="productoPedido" id="app">
	    	<img src="/PagFac/ArchivosSubidos/<?php echo $datosProducto['ImagenProducto']; ?>">
	    	<div>

  		    	<label><?php echo $datosProducto['NombreProducto'];?></label>
  		    	<span>ID: <?php echo $datosProducto['CodigoProducto'];?></span>
  		    	<span>Existencas: <?php echo $datosProducto['Existencias'];?></span>
  		    	<span>Precio: <?php echo $datosProducto['Precio'] . "$";?></span>
  		    	<div>
  		    		<label>N.Pedido:</label>
  		    		<label>{{pedido}}</label>
  		    		<input type="text" name="nPedido" id="nPedido" v-model.number="pedido">
  			    	<button @click="aumentarPedido">+</button>
  			    	<button @click="disminuyePedido">-</button>
  		    	</div>
  		      <input type="submit" value="Enviar pedido">
	    	</div>
    	</div>
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

    <script src="../Scripts/vue.js"></script>
    <script src="../Scripts/Pedidos-script.js"></script>

  </body>
</html>