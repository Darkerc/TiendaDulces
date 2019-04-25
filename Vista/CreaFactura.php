<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../Styles/FacturasEstilos.css" />
	</head>
	<body>
		<div class="titularPDF">Factura del producto</div>
		<div class="contenedorPDF">
			<div class="contenedorCuerpo">
				<section class="tarjetaProducto">
					<img src="../Resources/ImagenesProductos/kitkat1.jpg" class="imagenProducto"/>
					<div class="imagenNombre">Nombre Producto</div>
					<div class="tarjetaCabecera">
						<span class="tarjetaItem">Codigo del producto: <small class="itemDato">#12</small></span>
						<span class="tarjetaItem">Folio de la factura: <small class="itemDato">#12</small></span>
						<span class="tarjetaItem">Cantidad: <small class="itemDato">50</small></span>
					</div>
				</section>

				<section class="infoCompra">
					<div class="datosCompra">
						<h1 class="tituloCompra">Datos del comprador</h1>
						<span class="datoItem">Nombre de la tienda: <small class="itemDato">Hamburguesas Leos</small></span>
						<span class="datoItem">ID de la tienda: <small class="itemDato">#12</small></span>
						<span class="datoItem">Encargado: <small class="itemDato">Don pepe</small></span>
					</div>

					<div class="datosCompra">
						<h1 class="tituloCompra">Direccion</h1>
						<span class="datoItem">Pais: <small class="itemDato">Mexico</small></span>
						<span class="datoItem">Estado: <small class="itemDato">Tabasco</small></span>
						<span class="datoItem">Colonia: <small class="itemDato">Indeco</small></span>
					</div>

					<div class="datosCompra">
						<h1 class="tituloCompra">Dia de facturacion</h1>
						<span class="datoItem">Dia: <small class="itemDato"><?php $datosTiendaYFactura['dia']; ?></small></span>
						<span class="datoItem">Mes: <small class="itemDato"><?php $datosTiendaYFactura['mes']; ?></small></span>
						<span class="datoItem">Año: <small class="itemDato"><?php $datosTiendaYFactura['año']; ?></small></span>
					</div>
				</section>
			</div>
		</div>
		<span class="contenedorPie">
			<div class="datoItem">Empresa: <span class="itemDato">DHL</span></div>
			<div class="datoItem">ID Proveedor: <span class="itemDato">#10</span></div>
			<div class="datoItem">Nombre proveedor: <span class="itemDato">Nayanci</span></div>
		</span>
  </body>
</html>