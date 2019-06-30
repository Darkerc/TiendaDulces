<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'Proveedores';

    protected $fillable=[
        "Empresa_Id",
        "Nombre_Proveedor",
        "PrimerApellido",
        "SegundoApellido"
    ];

    protected function Empresa_Envios(){
        return $this->belongsTo(EmpresaEnvio::class,"Empresa_Id");
    }
}
