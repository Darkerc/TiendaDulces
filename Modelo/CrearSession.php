<?php

		require_once("ConexionClase.php");

		$NombreTienda=$_POST['NombreTienda'];

		$contrasena=$_POST['contrasena'];

		$conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
		$conexionBBDD->enviaCodificacion("utf8");

		$datosTienda=$conexionBBDD->datosSeleccionados("tienda",array("NombreTienda"=>$NombreTienda),PDO::FETCH_ASSOC,false);
		
		$conexionBBDD->cierraConexion();

		if($datosTienda=="Error en el registro" || $NombreTienda=="" && $contrasena==""){
			header("location:../Index.php");
		}
			
		if($datosTienda['NombreTienda']==$NombreTienda && password_verify($contrasena,$datosTienda['Contraseña'])){
				
			session_start();
			$_SESSION['TIENDA']=$datosTienda['idTienda'];
			header("location: ../Controlador/Productos-Controlador.php");
			
		}else{

			header("location:../Index.php");
		}



?>
		