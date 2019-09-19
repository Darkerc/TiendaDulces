<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mis Facturas</title>
    <link href="../Resources/png/017-sensible.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="../Styles/index.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
     <div id="app">
      <navegacion></navegacion>
      <div class="contenedorPrincipal">
        <div class="muestraFactura">
          <div class="tituloFactura">Facturas de: <?php echo $nombreEncargado['Encargado']; ?></div>
          <ul class="listaFacturas">
            <?php
            foreach($datosFacturas as $datos){
            ?>
              <li class="itemFactura">
                <a target="_blank" class="link" href="../API/pideFactura.php?tiendaID=<?php echo $_SESSION['TIENDA']; ?>&FolioFac=<?php echo $datos['FolioFactura']; ?>">
                  <button class="impFactura" id="btnImprimir">Imprimir</button>
                </a>
                <label for="btnImprimir" class="lbFactura">
                  <span class="folio">Folio #<?php echo $datos['FolioFactura']?></span>
                  <span>Dia: <?php echo $datos['dia'] ?></span>
                  <span>Mes: <?php echo $datos['mes']?> </span>
                  <span>Año: <?php echo $datos['año'] ?> </span>
                  <legend> <?php echo $datos['NombreProducto'] ?> </legend>
                </label>
              </li>
            <?php
            }
            ?>            
          </ul>
        </div>
      </div>
      
      <div class="tgSQLNone" id="mostrarSql">
        <div>
          <label>Sentencias SQL</label>
          <ul>
            <li>Insert Into Productos values (null,TiendaDueña,NombreProducto,Precio,Existencias,ImagenProducto)</li>
          </ul>
        </div>
      </div>

      <div class="sentenciaSql" id="btnSql">
        <span>SQL</span>
      </div>     
      <pie></pie>
    </div>

    <script src="../Scripts/jquery-3.3.1.js"></script>
    <script src="../Scripts/vue.js"></script>
    <script src="../Scripts/JSGeneral.js"></script>
    <script src="../Scripts/MisFacturas-script.js"></script>
</body>
</html>