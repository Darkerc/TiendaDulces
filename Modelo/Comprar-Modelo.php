<?php

	require("ConexionClase.php");

	class ComprarModelo{
		
		protected $conexionBBDD;
		
		public function ComprarModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
		
			$this->conexionBBDD->enviaCodificacion("utf8");
		}
		
		public function usuariosTienda(){
	
			return $this->conexionBBDD->datosTodosSCP("Select * From PRODUCTOS WHERE TiendaDueña != " . $_SESSION['TIENDA'] ,PDO::FETCH_ASSOC,true);
			
		}
		
		public function cerrarConexion(){
			$this->conexionBBDD->cierraConexion();
		}
		
		public function sentenciasSQL(){
			return $this->conexionBBDD->sentenciasSQL;
		}
	}

?>