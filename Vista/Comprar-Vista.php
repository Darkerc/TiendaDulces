<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Productos</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <div id="app">
      <navegacion></navegacion>
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
    <script type="text/javascript" src="../Scripts/vue.js"></script>
    <script type="text/javascript" src="../Scripts/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>

  </body>
</html>