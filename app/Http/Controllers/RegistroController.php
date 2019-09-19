<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;

class RegistroController extends Controller
{
    public function login($nombreTienda,$contrasegna){
        //Recuperando el valor del input tienda si existe en la base de datos
        $tienda=Tienda::where("Nombre_Tienda",$nombreTienda)->first();

        //Comparando la contraseña del input con la recuperada de la base de datos
        $contraseñaCorrecta=password_verify($contrasegna,$tienda['Contrasena']);

        //Verificando si la respuesta no es nula
        if(gettype($tienda)!="NULL"){
            if($contraseñaCorrecta){
                // session(["TIENDA" => $tienda['id']]);

                return $tienda;
            }else{

                $error=["Error" => "Contraseña incorrecta"];

                return json_encode($error);
            }
        }else{
            $error=["Error" => "El usuario no ha sido encontrado"];

            return json_encode($error);
        }
    }

    public function crearUsuario(Request $request){

        $datosUsuarioNuevo=$request->all();
        $datosUsuarioNuevo['Contrasena']=password_hash($request->Contrasena,PASSWORD_DEFAULT,["cost"=>12]);
        Tienda::create($datosUsuarioNuevo);

        return;
    }
}
