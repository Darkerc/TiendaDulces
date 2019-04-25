<?php

	require("ConexionClase.php");
	
	class ProductosModelo{
		
		protected $conexionBBDD;
		
		public function ProductosModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
			$this->conexionBBDD->enviaCodificacion("utf8");
			
		}
		
		public function usuariosTienda(){
			return $this->conexionBBDD->datosTodos("productos",PDO::FETCH_OBJ,true);
		}
		
		public function cerrarConexion(){
			$this->conexionBBDD->cierraConexion();
		}
		
		public function sentenciasSQL(){
			return $this->conexionBBDD->sentenciasSQL;
		}
			
	}
	


?>