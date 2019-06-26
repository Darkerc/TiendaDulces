<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'Tiendas';

    protected $fillable=[
        "Nombre_Tienda",
        "Contrasena",
        "Encargado",
        "Pais",
        "Estado",
        "Colonia"
    ];
}
