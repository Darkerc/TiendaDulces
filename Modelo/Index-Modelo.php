<?php

	require("ConexionClase.php");

	class IndexModelo{
		
		protected $conexionBBDD;
		
		public function IndexModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
		
			$this->conexionBBDD->enviaCodificacion("utf8");
		}
		
		
		public function añadeTienda($arrayDatos){
			$this->conexionBBDD->insertaDatos("tienda",$arrayDatos);
			
		}
		
		public function cerrarConexion(){
			$this->conexionBBDD->cierraConexion();
		}
	}



?>