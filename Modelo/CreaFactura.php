<?php
	
	require_once("ConexionClase.php");

	if($_POST['nPedido']==0){
		header("location: ../index.php");
		exit();
	}
	
	try{
	
	session_start();

	$ConexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

	$ConexionBBDD->enviaCodificacion("utf8");

	$datosTienda=$ConexionBBDD->datosSeleccionados("tienda",array("idTienda"=>$_SESSION['TIENDA']),PDO::FETCH_ASSOC,false);
		
	$proveedorAleatorio=rand(1,3);

	$ConexionBBDD->insertaDatos("facturas",array("TiendaFacturada"=>$datosTienda['idTienda'],
												 "CodigoProducto"=>$_GET['CodigoProducto'],
												 "NumProveedor"=>$proveedorAleatorio,
												 "CantidadProducto"=>$_POST['nPedido']));
		
		
		
	header("location: ../Vista/AvisoFactura.php");
		
	}catch(Exception $e){
		
		echo "Error: <br>" . $e;
		
		header("location: ../Vista/ErrorFactura.html");

		
	}


	
	

	



?>