<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Productos';

    protected function Tienda_Duena(){
        return $this->belongsTo(Tienda::class,"Tienda_Id");
    }

    protected $fillable=[
        "Tienda_Id",
        "Nombre_Producto",
        "Precio",
        "Existencias",
        "Imagen_Producto"
    ];
}
