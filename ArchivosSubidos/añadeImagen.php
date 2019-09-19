<?php

    require_once "../Modelo/ConexionClase.php";

    $conecxionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

    $formatosPermitidos=array("jpg","jpeg","png","gif");

    $tipoImagen=null ? "Error al insertar el campo" : $_FILES['ImagenProducto']['type'];

	for($i=0;$i<count($formatosPermitidos);$i++){

		$formatosPermitidos[$i]="image/".$formatosPermitidos[$i];

	}

	if(in_array($tipoImagen,$formatosPermitidos) && $tamagnoImagen<=3000000){
		
	    //Ruta de la carpeta destino del servidor
	    $carpetaDestino=$_SERVER['DOCUMENT_ROOT'] . "/PagFac/ArchivosSubidos/";

	    //Movemos la imagen del directorio temporal al directorio escogido

	    move_uploaded_file($ImagenTMP,$carpetaDestino . $ImagenProducto);

	}
?>