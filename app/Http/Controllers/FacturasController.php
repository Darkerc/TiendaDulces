<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Producto;
use App\Tienda;
use App\Empresa_Envios;
use App\Proveedor;
use Dompdf\Dompdf;


class FacturasController extends Controller
{
    public function facturasUsuario($idTienda){
        $facturasUsuario=Factura::where("Tienda_Id",$idTienda)->get();

        for ($i=0; $i < count($facturasUsuario); $i++) {
            $datosFactura=json_decode($facturasUsuario[$i],true);
            $datosExtra=[$facturasUsuario[$i]->Tienda_Duena, $facturasUsuario[$i]->Producto];
            array_push($datosFactura, $datosExtra);
            json_encode($facturasUsuario[$i]);
        }

        return $facturasUsuario;
    }

    public function verFactura($idFactura){
        $datosFactura=Factura::findOrFail($idFactura);

        //instacia de dompedf
        $creaPDF=new Dompdf();

        //Los recursos del pdf deven ser especificados con rutas absolutas al servidor
        $rutaImagen= $_SERVER['DOCUMENT_ROOT'] . "\images\ProductoImg\\" . $datosFactura->Producto->Tienda_Duena->Nombre_Tienda . "\\" . $datosFactura->Producto->Imagen_Producto;

        //Enviarselo a dompdf
        $creaPDF->loadHtml(view("VerFactura",compact("datosFactura","rutaImagen")));

        //El tamaño del papel
        $creaPDF->setPaper("A4","landscape");

        //Renderizar html como pdf
        $creaPDF->render();

        return $creaPDF->stream("Factura",array("Attachment" => 0));
    }
}
