<?php

require("ConexionClase.php");
	
class MisFacturas{
    
    protected $conexionBBDD;
    
    public function MisFacturas(){
        
        $this->conexionBBDD=new ConexionBBDD("localhost","bbddfacturas","root","");
        $this->conexionBBDD->enviaCodificacion("utf8");
        
    }
    
    public function datosFactura($idTienda){
        return $this->conexionBBDD->datosTodosSCP("SELECT day(FechaCompra) as dia, month(FechaCompra) as mes, year(FechaCompra) as año,FolioFactura,NombreProducto,Encargado From facturas,productos,tienda WHERE TiendaFacturada=$idTienda AND facturas.CodigoProducto=productos.CodigoProducto AND TiendaFacturada=idTienda",PDO::FETCH_ASSOC,true);
    }

    public function nombreEncargado($idTienda){
        return $this->conexionBBDD->datosTodosSCP("SELECT Encargado FROM tienda WHERE idTienda = $idTienda",PDO::FETCH_ASSOC,false);
    }

    public function cerrarConexion(){
        //$this->conexionBBDD->cl
    }
        
}


?>