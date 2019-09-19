<?php

	require_once '../Modelo/ConexionClase.php';

	$conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");

	$conexionBBDD->enviaCodificacion("utf8");
	
	$nombre=$_GET['NombreT'] ? $_GET['NombreT'] : "";
	$contra=$_GET['Contra'] ? $_GET['Contra'] : "";

	try{

		$datosTienda=$conexionBBDD->datosSeleccionados("tienda",array("NombreTienda"=>$nombre),PDO::FETCH_ASSOC,false);

		if(password_verify($contra,$datosTienda['Contrasegna'])){

			echo json_encode($datosTienda);

		}else{

			echo json_encode(array("NombreTienda"=>"Desconocido","Contraseña"=>"Desconocido"));

		}

	}catch(Exception $e){
				
		echo json_encode(array("NombreTienda"=>"Desconocido","Contraseña"=>"Desconocido"));
		
	}

?>