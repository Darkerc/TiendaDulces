<?php

	require("ConexionClase.php");

	class PedidosModelo{
		
		protected $conexionBBDD;
		
		public function PedidosModelo(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
			
			$this->conexionBBDD->enviaCodificacion("utf8");
			
		}
		
		public function datosProducto($id){
			return $this->conexionBBDD->datosSeleccionados("productos",array("CodigoProducto"=>$id),PDO::FETCH_ASSOC,false);
		}
		
		public function sentenciasSQL(){
			return $this->conexionBBDD->sentenciasSQL;
		}
		
		
	}


?>