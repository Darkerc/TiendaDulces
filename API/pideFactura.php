<?php

	require_once("../Modelo/VerFactura-Modelo.php");

	require_once("../Controlador/dompdf/autoload.inc.php");
	
    $datosFactura=new VerFactura();
    
    $idTienda=$_GET['tiendaID'];

    $FolioFactura=$_GET['FolioFac'];

	$datosTiendaYFactura=$datosFactura->datosFacturaYTienda($idTienda,$FolioFactura);

	$fechasFactura=$datosFactura->datosFechaFactura($idTienda,$FolioFactura);

	$datosProvEmpresa=$datosFactura->datosProveedorEmpresa($idTienda,$FolioFactura);

	$imagen=$datosFactura->rutaImagen($idTienda,$FolioFactura)['ImagenProducto'];

	$nombreProducto=$datosFactura->rutaImagen($idTienda,$FolioFactura)['NombreProducto'];
	
	//require_once("../Vista/CreaFactura.php");
	
	use Dompdf\Dompdf;
	
	//instacia de dompedf
	$creaPDF=new Dompdf();

	//Obtener el archivo HTML
	//$html=file_get_contents("../Vista/CreaFactura.php");
	$html=<<<EOT

		<html>
		<head>
			<link type="text/css" rel="stylesheet" href="../Styles/FacturasEstilos.css" />
		</head>
		<body>
			<div class="titularPDF">Factura del producto</div>
			<div class="contenedorPDF">
				<div class="contenedorCuerpo">
					<section class="tarjetaProducto">
						<img src="../ArchivosSubidos/$imagen" class="imagenProducto"/>
						<div class="imagenNombre">$nombreProducto</div>
						<div class="tarjetaCabecera">
							<span class="tarjetaItem">Codigo del producto: <small class="itemDato">#{$datosTiendaYFactura['CodigoProducto']}</small></span>
							<span class="tarjetaItem">Folio de la factura: <small class="itemDato">#{$datosTiendaYFactura['FolioFactura']}</small></span>
							<span class="tarjetaItem">Cantidad: <small class="itemDato">#{$datosTiendaYFactura['CantidadProducto']}</small></span>
						</div>
					</section>

					<section class="infoCompra">
						<div class="datosCompra">
							<h1 class="tituloCompra">Datos del comprador</h1>
							<span class="datoItem">Nombre de la tienda: <small class="itemDato">{$datosTiendaYFactura['NombreTienda']}</small></span>
							<span class="datoItem">ID de la tienda: <small class="itemDato">#{$datosTiendaYFactura['idTienda']}</small></span>
							<span class="datoItem">Encargado: <small class="itemDato">{$datosTiendaYFactura['Encargado']}</small></span>
						</div>

						<div class="datosCompra">
							<h1 class="tituloCompra">Direccion</h1>
							<span class="datoItem">Pais: <small class="itemDato">{$datosTiendaYFactura['Pais']}</small></span>
							<span class="datoItem">Estado: <small class="itemDato">{$datosTiendaYFactura['Estado']}</small></span>
							<span class="datoItem">Colonia: <small class="itemDato">{$datosTiendaYFactura['Colonia']}</small></span>
						</div>

						<div class="datosCompra">
							<h1 class="tituloCompra">Dia de facturacion</h1>
							<span class="datoItem">Dia: <small class="itemDato">{$fechasFactura['dia']}</small></span>
							<span class="datoItem">Mes: <small class="itemDato">{$fechasFactura['mes']}</small></span>
							<span class="datoItem">Año: <small class="itemDato">{$fechasFactura['año']}</small></span>
						</div>
					</section>
				</div>
			</div>
			<span class="contenedorPie">
				<div class="datoItem">Empresa: <span class="itemDato">{$datosProvEmpresa['NombreEmpresa']}</span></div>
				<div class="datoItem">ID Proveedor: <span class="itemDato">#{$datosProvEmpresa['NumProveedor']}</span></div>
				<div class="datoItem">Nombre proveedor: <span class="itemDato">{$datosProvEmpresa['Nombre']} {$datosProvEmpresa['PrimerApellido']}</span></div>
			</span>
	</body>
	</html>
EOT;
	
	//Enviarselo a dompdf
	$creaPDF->loadHtml($html);

	//El tamaño del papel
	$creaPDF->setPaper("A4","landscape");
		
	//Renderizar html como pdf
	$creaPDF->render();
	
	//Salida del pdf
	$creaPDF->stream("Factura",array("Attachment" => 0));

?>
