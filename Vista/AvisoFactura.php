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
  <div id="app">
        <navegacion></navegacion>
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

        <div class="tgSQLNone" id="mostrarSql">
          <div>
            <label>Sentencias SQL</label>
            <ul>
              <li>SELECT * FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and idTienda = TiendaFacturada</li>
              <li>SELECT day(FechaCompra) as dia, month(FechaCompra) as mes, year(FechaCompra) as año FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and  idTienda = TiendaFacturada</li>
              <li>SELECT * FROM facturas,proveedores,empresasenvios WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and facturas.NumProveedor = proveedores.NumProveedor and EmpresaPerteneciente = CodigoEmpresa</li>
              <li>SELECT ImagenProducto,NombreProducto FROM productos,facturas WHERE FechaCompra = (SELECT MAX(FechaCompra) FROM facturas) and facturas.CodigoProducto = productos.CodigoProducto</li>
            </ul>
          </div>
        </div>

        <div class="sentenciaSql" id="btnSql">
          <span>SQL</span>
        </div>
        <pie></pie>
  </div>
  <script src="../Scripts/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../Scripts/vue.js"></script>
  <script type="text/javascript" src="../Scripts/JSGeneral.js"></script>

</body>
</html>