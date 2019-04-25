<?php

require("ConexionClase.php");

	class VerFactura{
		
		protected $conexionBBDD;
		
		public function VerFactura(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
			
			$this->conexionBBDD->enviaCodificacion("utf8");
			
		}

		public function datosFacturaYTienda(){
			return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and idTienda = TiendaFacturada",PDO::FETCH_ASSOC,false);
		}

		public function datosFechaFactura(){
			return $this->conexionBBDD->datosTodosSCP("SELECT day(FechaCompra) as dia, month(FechaCompra) as mes, year(FechaCompra) as año FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and  idTienda = TiendaFacturada",PDO::FETCH_ASSOC,false);
		}

		public function datosProveedorEmpresa(){
			return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,proveedores,empresasenvios WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and facturas.NumProveedor = proveedores.NumProveedor and EmpresaPerteneciente = CodigoEmpresa",PDO::FETCH_ASSOC,false);
		}

		public function rutaImagen(){
			return $this->conexionBBDD->datosTodosSCP("SELECT ImagenProducto FROM productos,facturas WHERE FechaCompra = (SELECT MAX(FechaCompra) FROM facturas) and facturas.CodigoProducto = productos.CodigoProducto",PDO::FETCH_ASSOC,false);

		}

    }
    
?>