<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Productos</title>
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
    	<div class="contenedorProductos">
      <?php foreach($productos as $datos){ ?>
      <a href="../Controlador/Pedidos-Controlador.php?id=<?php echo $datos['CodigoProducto']; ?>">
        <legend>
          <?php echo $datos['NombreProducto']; ?>
        </legend>
        <label>
          <?php echo $datos['Precio'] . "$"; ?>
        </label>
        <span>
          <?php echo $datos['Existencias'] . " Existencias"; ?>
        </span>
		<img src="/PagFac/ArchivosSubidos/<?php echo $datos['ImagenProducto']; ?>" />
      </a>
      <?php } ?>
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
  </body>
</html>