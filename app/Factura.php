<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'Facturas';
    //Permite el uso de funciones de formato para fechas
    protected $dates = ['created_at', 'updated_at', 'Fecha_Compra'];

    protected function Proveedor(){
        return $this->belongsTo(Proveedor::class,"Proveedor_Id");
    }

    protected function Tienda_Duena(){
        return $this->belongsTo(Tienda::class,"Tienda_Id");
    }

    protected function Producto(){
        return $this->belongsTo(Producto::class,"Producto_Id");
    }



}
