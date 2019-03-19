<?php

	require("../Modelo/Comprar-Modelo.php");

	require("../Modelo/VerificarSesion.php");

	$datosProductos=new ComprarModelo();

	$productos=$datosProductos->usuariosTienda();

	$datosProductos->cerrarConexion();

	require("../Vista/Comprar-Vista.php");

?>