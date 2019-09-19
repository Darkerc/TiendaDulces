<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Tienda;
use App\Factura;

class ProductosController extends Controller
{
    public function productosUsuario($idUsuario){

        $producto=Producto::where("Tienda_Id",$idUsuario)->get();

        for ($i=0; $i < count($producto); $i++) {
            $datosProducto=json_decode($producto[$i],true);
            $datosExtra=["Nombre_Tienda" => $producto[$i]->Tienda_Duena->Nombre_Tienda];
            array_push($datosProducto, $datosExtra);
            json_encode($producto[$i]);
        }

       return $producto;
    }

    public function productosDisponibles($idUsuario){

        $producto=Producto::whereNotIn("Tienda_Id",[$idUsuario])->get();

        for ($i=0; $i < count($producto); $i++) {
        //    array_push($producto[$i],$producto[$i]->Tienda_Duena->Nombre_Tienda);
            $datosProducto=json_decode($producto[$i],true);
            $datosExtra=["Nombre_Tienda" => $producto[$i]->Tienda_Duena->Nombre_Tienda];
            array_push($datosProducto, $datosExtra);
            json_encode($producto[$i]);
        }

       return $producto;
    }

    public function pedirProducto($idProducto){
        $producto=Producto::findOrFail($idProducto);
        $tiendaDuegna=$producto->Tienda_Duena->Nombre_Producto;
        $arrayProducto=json_decode($producto,true);
        $arrayTiendaDuena=json_decode($tiendaDuegna,true);

        array_push($arrayProducto , $arrayTiendaDuena );

        return json_encode($arrayProducto);
    }

    public function productosTotales(){
        return Producto::all();
    }

    public function productosCrear(Request $request){

        $datosProducto=$request->all();
        $idTienda=$datosProducto["Tienda_Id"];
        $nombreTienda=Tienda::findOrFail($idTienda);
        $cantidadProductosTotales=Producto::where("Tienda_Id",$idTienda)->count();

        if($archivo=$request->file('Imagen_Producto')){

            $contador=1;
            $nombre="Img_Producto" . ((( int ) $cantidadProductosTotales)+($contador)) . "." .$archivo->getClientOriginalExtension();
            $url='images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" . $nombre;

            //Verificando si exite la ruta y modificandola para crear un nuevo nombre a la imagen
            while (is_file($url)) {
                $contador++;
                //Nombre de la imagen que se ha seleccionado para en el formulario para guardar
                $nombre="Img_Producto" . ((( int ) $cantidadProductosTotales)+($contador)) . "." .$archivo->getClientOriginalExtension();
                $url='images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" . $nombre;
            }

            //Mueve la imagen al directorio 'images' y le asigna un nombre que es el de la propia imagen
            $archivo->move('images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" ,$nombre);

            //Asignandole la ruta de la imagen a la variable entrada
            $datosProducto['Imagen_Producto']=$nombre;
        }

        //Almacennando los datos en la BBDD
        // Producto::create($datosProducto);

        return Producto::create($datosProducto);
    }

    public function crearPedido(Request $request,$idUsuario,$idProducto){

        $proveedorId=rand(1,3);

        $nuevaFactura=new Factura();
        $nuevaFactura->Producto_Id=$idProducto;
        $nuevaFactura->Proveedor_Id=$proveedorId;
        $nuevaFactura->Tienda_Id=$idUsuario;
        $nuevaFactura->save();

        return;
    }

    public function productoEliminar($idProducto){
        Producto::destroy($idProducto);
        return;
    }

    public function productoActualizar(Request $request,$idProducto,$sessionTiendaId){
        $datosProducto=$request->all();
        $idTienda=$sessionTiendaId;
        $nombreTienda=Tienda::findOrFail($idTienda);
        $cantidadProductosTotales=Producto::where("Tienda_Id",$idTienda)->count();
        $producto=Producto::findOrFail($idProducto);

        if($archivo=$request->file('Imagen_Producto')){

            $contador=1;
            $nombre="Img_Producto" . ((( int ) $cantidadProductosTotales)+($contador)) . "." .$archivo->getClientOriginalExtension();
            $url='images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" . $nombre;

            //Verificando si exite la ruta y modificandola para crear un nuevo nombre a la imagen
            while (is_file($url)) {
                $contador++;
                //Nombre de la imagen que se ha seleccionado para en el formulario para guardar
                $nombre="Img_Producto" . ((( int ) $cantidadProductosTotales)+($contador)) . "." .$archivo->getClientOriginalExtension();
                $url='images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" . $nombre;
            }

            //Mueve la imagen al directorio 'images' y le asigna un nombre que es el de la propia imagen
            $archivo->move('images/ProductoImg/' . $nombreTienda->Nombre_Tienda . "/" ,$nombre);

            $datosProducto['Imagen_Producto']=$nombre;
        }

        //Asignandole la ruta de la imagen a la variable entrada
        $datosProducto['Tienda_Id']=$idTienda;

        //Actualizando el producto
        $producto->update($datosProducto);

        return $request;
    }

}
