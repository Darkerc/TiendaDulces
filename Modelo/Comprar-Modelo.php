<?php

	require("ConexionClase.php");

	class ComprarModelo{
		
		protected $conexionBBDD;
		
		public function ComprarModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
		
			$this->conexionBBDD->enviaCodificacion("utf8");
		}
		
		public function usuariosTienda(){
			return $this->conexionBBDD->datosTodos("productos",PDO::FETCH_ASSOC,true);
		}
		
		public function cerrarConexion(){
			$this->conexionBBDD->cierraConexion();
		}
	}

?>