<?php

	require("../Modelo/index-Modelo.php");

	$nomTienda;

	$pais;

	$contraseña;

	$estado;

	$colonia;

	$encargado;

	try{

	$nomTienda= null ? "Error al insertar el campo" : $_POST['NomTienda'];

	$contrasena=null ? "Error al insertar el campo" : $_POST['Contraseña'];

	$pais= null ? "Error al insertar el campo" : $_POST['Pais'];

	$estado= null ? "Error al insertar el campo" : $_POST['Estado'];

	$colonia= null ? "Error al insertar el campo" : $_POST['Colonia'];

	$encargado= null ? "Error al insertar el campo" : $_POST['Encargado'];
		
	}catch(Exception $e){
		
		header("location: ../index.php");
		
	}

	$indexModelo=new IndexModelo();

	$contraCifrada=password_hash($contrasena,PASSWORD_DEFAULT,array("cost"=>12));

	$datosTienda=array("NombreTienda"=>"$nomTienda",
								   "Contraseña"=>$contraCifrada,
								   "Pais"=>$pais,
								   "Estado"=>$estado,
								   "Colonia"=>$colonia,
								   "Encargado"=>$encargado);

	if(!in_array("Error al insertar el campo",$datosTienda)){
		
		$indexModelo->añadeTienda($datosTienda);
		
	}

	

	header("location: ../index.php");

	 
?>
