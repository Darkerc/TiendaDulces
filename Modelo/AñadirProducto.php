<?php 
	
	require("ConexionClase.php");

	$nombreProducto;
	$precio;
	$existencias;
	$ImagenProducto;
	$ImagenTMP;
	$tipoImagen;
	$tamagnoImagen;


	try{

		$nombreProducto=null ? "Error al insertar el campo" : $_POST['NombreProducto'];

		$precio=null ? "Error al insertar el campo" : $_POST['Precio'];

		$existencias=null ? "Error al insertar el campo" : $_POST['Existencias'];

		$ImagenProducto=null ? "Error al insertar el campo" : $_FILES['ImagenProducto']['name'];
		
		$ImagenTMP=$_FILES['ImagenProducto']['tmp_name'];

		$tipoImagen=null ? "Error al insertar el campo" : $_FILES['ImagenProducto']['type'];

		$tamagnoImagen=null ? "Error al insertar el campo" : $_FILES['ImagenProducto']['size'];

	}catch(Exception $e){

		header("location: ../Controlador/Comprar-Controlador.php");

	}

	$formatosPermitidos=array("jpg","jpeg","png","gif");

	for($i=0;$i<count($formatosPermitidos);$i++){

		$formatosPermitidos[$i]="image/".$formatosPermitidos[$i];

	}

	if(in_array($tipoImagen,$formatosPermitidos) && $tamagnoImagen<=3000000){
		
	//Ruta de la carpeta destino del servidor
	$carpetaDestino=$_SERVER['DOCUMENT_ROOT'] . "/PagFac/ArchivosSubidos/";

	//Movemos la imagen del directorio temporal al directorio escogido

	move_uploaded_file($ImagenTMP,$carpetaDestino . $ImagenProducto);

	}else{
		header("location: ../Controlador/Productos-Controlador.php");
	}

	session_start();

	$conecxionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

	$conecxionBBDD->enviaCodificacion("utf8");

	$conecxionBBDD->insertaDatos("productos",array("NombreProducto"=>$nombreProducto,
												   "TiendaDueña"=>$_SESSION['TIENDA'],
												   "Precio"=>$precio,
												   "Existencias"=>$existencias,
												   "ImagenProducto"=>$ImagenProducto));

	header("location: ../Controlador/Comprar-Controlador.php");


	
?>