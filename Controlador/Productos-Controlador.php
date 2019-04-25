<?php

	require("../Modelo/Productos-Modelo.php");

	session_start();

	if(!isset($_SESSION['TIENDA'])){
		echo "aqui";
		header("location:../Index.php");
		
	}
	

	$datosProductos=new ProductosModelo();

	$productos=$datosProductos->usuariosTienda();

	$SQL=$datosProductos->sentenciasSQL();

	$datosProductos->cerrarConexion();
	
	include("../Vista/Productos-Vista.php");
	
?>