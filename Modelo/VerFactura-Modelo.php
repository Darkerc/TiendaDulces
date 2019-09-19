<?php

require("ConexionClase.php");

	class VerFactura{
		
		protected $conexionBBDD;
		
		public function VerFactura(){
			
			$this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
			
			$this->conexionBBDD->enviaCodificacion("utf8");
			
		}

		public function datosFacturaYTienda($idTienda,$FolioFactura=null){

			if($FolioFactura!=null){
				return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,tienda WHERE idTienda = $idTienda AND FolioFactura = $FolioFactura",PDO::FETCH_ASSOC,false);
			}else{
				return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and idTienda = $idTienda",PDO::FETCH_ASSOC,false);
			}
		}

		public function datosFechaFactura($idTienda,$FolioFactura=null){

			if($FolioFactura!=null){
				return $this->conexionBBDD->datosTodosSCP("SELECT day(FechaCompra) as dia, month(FechaCompra) as mes, year(FechaCompra) as año FROM facturas,tienda WHERE idTienda = $idTienda and FolioFactura = $FolioFactura",PDO::FETCH_ASSOC,false);

			}else{
				return $this->conexionBBDD->datosTodosSCP("SELECT day(FechaCompra) as dia, month(FechaCompra) as mes, year(FechaCompra) as año FROM facturas,tienda WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and  idTienda = $idTienda",PDO::FETCH_ASSOC,false);

			}

		}

		public function datosProveedorEmpresa($idTienda,$FolioFactura=null){

			if($FolioFactura!=null){
				return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,proveedores,empresasenvios WHERE facturas.NumProveedor = proveedores.NumProveedor and EmpresaPerteneciente = CodigoEmpresa and facturas.TiendaFacturada = $idTienda and FolioFactura = $FolioFactura",PDO::FETCH_ASSOC,false);

			}else{

			return $this->conexionBBDD->datosTodosSCP("SELECT * FROM facturas,proveedores,empresasenvios WHERE FechaCompra = (SELECT MAX(FechaCompra) From facturas) and facturas.NumProveedor = proveedores.NumProveedor and EmpresaPerteneciente = CodigoEmpresa and facturas.TiendaFacturada = $idTienda",PDO::FETCH_ASSOC,false);
			}
		}

		public function rutaImagen($idTienda,$FolioFactura=null){

			if($FolioFactura!=null){
				return $this->conexionBBDD->datosTodosSCP("SELECT ImagenProducto,NombreProducto FROM productos,facturas WHERE facturas.CodigoProducto = productos.CodigoProducto and facturas.TiendaFacturada = $idTienda and FolioFactura = $FolioFactura",PDO::FETCH_ASSOC,false);

			}else{
				return $this->conexionBBDD->datosTodosSCP("SELECT ImagenProducto,NombreProducto FROM productos,facturas WHERE FechaCompra = (SELECT MAX(FechaCompra) FROM facturas) and facturas.CodigoProducto = productos.CodigoProducto",PDO::FETCH_ASSOC,false);
			}
		}

    }
    
?>