<?php

	require("ConexionClase.php");

	class CreaProducto{
		
		protected $conexionBBDD;
		
		public function ComprarModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
		
			$this->conexionBBDD->enviaCodificacion("utf8");
		}
		
		
		public function sentenciasSQL(){
			return $this->conexionBBDD->sentenciasSQL;
		}
	}


?>