<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'Proveedores';

    protected function Empresa_Envios(){
        return $this->belongsTo(EmpresaEnvio::class,"Empresa_Id");
    }
}
