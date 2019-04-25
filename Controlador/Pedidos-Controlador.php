<?php

	require("../Modelo/Pedidos-Modelo.php");

	require("../Modelo/VerificarSesion.php");

	$idProducto;

	try{
	
	$idProducto=$_GET['id'];
	
	}catch(Exception $e){
		
		header("location: ../Controlador/Productos-Controlador.php");
		
	}

	$datosProductoPedido=new PedidosModelo();

	$datosProducto=$datosProductoPedido->datosProducto($idProducto);

	$SQL=$datosProductoPedido->sentenciasSQL();

	require("../Vista/Pedidos-Vista.php");

?>