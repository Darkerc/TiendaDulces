<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Pedidos</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <div id="app">
      <navegacion></navegacion>
      <div class="contenedorPrincipal">
        <div class="productoPedido">
          <img src="/PagFac/ArchivosSubidos/<?php echo $datosProducto['ImagenProducto']; ?>">
          <form method="post" action="../Modelo/CreaFactura.php?CodigoProducto=<?php echo $datosProducto['CodigoProducto'];?>" id="formProducto" name="formProducto">

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
              <input type="submit" value="Enviar pedido" id="enviaProducto" name="enviaProducto">
          
          </form>
        </div>
        <label id="contError"></label>
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
      
      <pie></pie>
    </div>
    
    <script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
    <script src="../Scripts/Pedidos-script.js"></script>
    <script type="text/javascript" src="../Scripts/vue.js"></script>
    <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>
  </body>
</html>