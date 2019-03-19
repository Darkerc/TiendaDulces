<?php

	require("Modelo/ConexionClase.php");

	/*if($_FILES['imagen']==null)echo "nomas no";

	$conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

	$conexionBBDD->enviaCodificacion("utf8");

	$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

 	echo $_FILES['imagen']['tmp_name'];

	$conexionBBDD->actualizaDatos("productos",array("CodigoProducto"=>$_POST['CodigoProducto']),array("ImagenProducto"=>$imagen));*/
	
	$nombreImagen=$_FILES['imagen']['name'];
	
	$tipoImagen=$_FILES['imagen']['type'];

	$tamagnoImagen=$_FILES['imagen']['size'];

	$codigoProducto=$_POST['CodigoProducto'];

	$formatosPermitidos=array("jpg","jpeg","png","gif");

	for($i=0;$i<count($formatosPermitidos);$i++){
		
		$formatosPermitidos[$i]="image/".$formatosPermitidos[$i];
		
	}

	if(in_array($tipoImagen,$formatosPermitidos) && $tamagnoImagen<=3000000){
		
	//Ruta de la carpeta destino del servidor
	$carpetaDestino=$_SERVER['DOCUMENT_ROOT'] . "/PagFac/ArchivosSubidos/";

	//Movemos la imagen del directorio temporal al directorio escogido

	move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetaDestino . $nombreImagen);

	}else{
		//Ya lueguito
	}


	
	$conecxionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

	$conecxionBBDD->enviaCodificacion("utf8");

	$conecxionBBDD->actualizaDatos("productos",array("CodigoProducto"=>$codigoProducto),array("ImagenProducto"=>$nombreImagen));


		
?>