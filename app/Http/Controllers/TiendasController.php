<?php

namespace App\Http\Controllers;

require_once("dompdf/autoload.inc.php");
use Illuminate\Http\Request;
use App\Tienda;
use App\Producto;
use App\Factura;
use Dompdf\Dompdf;


class TiendasController extends Controller
{

    public function verificaSession(){
        if(session()->has('TIENDA')==true){

            return ["SessionIniciada" => true,
                    "Redirect" => ""];
        }else{
            return ["SessionIniciada" => false,
                    "Redirect" => redirect()->route("Index")];
        }
    }

    public function index(){
        if(session()->has('TIENDA')==true){
            return redirect()->route("Productos");
        }
        return view("Index");
    }

    public function registro(){
        if(session()->has('TIENDA')==true){
            return redirect()->route("Productos");
        }

        return view("Registro");
    }

    public function comprar(){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
        //Productos que no pertenecen a la tienda que ha iniciado session
        $productosTiendas=Producto::whereNotIn("Tienda_Id",[session()->get('TIENDA')])->get();

        return view("Comprar")->with(compact("productosTiendas"));
    }

    public function productos(){

        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
        $productos=Producto::all();

        return view("Productos",compact("productos"));
    }

    public function creaProducto(){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
        return view("CreaProducto");
    }

    public function misFacturas(){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
        $facturasTienda=Factura::where("Tienda_Id",session()->get("TIENDA"))->get();

        return view("MisFacturas",compact("facturasTienda"));
    }

    public function misProductos(){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }

        $productosUsuario=Producto::where("Tienda_Id",session()->get("TIENDA"))->get();

        return view("MisProductos",compact("productosUsuario"));
    }

    public function actualizaProducto($idProducto){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
        $datosProducto=Producto::findOrFail($idProducto);


        return view("ActualizaProducto",compact("datosProducto"));
    }

    public function verFactura($idFactura){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }
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

    public function pedidos($idProducto){
        if(!$this->verificaSession()["SessionIniciada"]){
            return $this->verificaSession()["Redirect"];
        }

        $productoPedido=Producto::findOrFail($idProducto);
        $tiendaId=session()->get("TIENDA");

        if($tiendaId==$productoPedido->Tienda_Id){
            return redirect()->route("Comprar");
        }

        return view("Pedidos",compact("productoPedido"));
    }

    public function cerrarSesion(){
        session()->forget("TIENDA");
        return redirect()->route("Index");
    }

    public function acceso(Request $request){
        //Recuperando el valor del input tienda si existe en la base de datos
        $tienda=Tienda::where("Nombre_Tienda",$request->Nombre_Tienda)->first();

        //Comparando la contraseña del input con la recuperada de la base de datos
        $contraseñaCorrecta=password_verify($request->Contrasena,$tienda['Contrasena']);

        //Verificando si la respuesta no es nula
        if(gettype($tienda)!="NULL"){
            if($contraseñaCorrecta){
                session(["TIENDA" => $tienda['id']]);

                return $this->productos();//view("Productos");
            }else{

                $error="Los datos no concuerdan con los de los de nuestros registros";

                return back()->withInput();
            }
        }else{
            return back()->withInput();
        }
    }

    public function creaUsuario(Request $request){
        if(!$request==null){
            $datosUsuarioNuevo=$request->all();
            $datosUsuarioNuevo['Contrasena']=password_hash($request->Contrasena,PASSWORD_DEFAULT,["cost"=>12]);
            Tienda::create($datosUsuarioNuevo);
        }
        return redirect()->route("Index");
    }

    public function creaFactura($idProducto){
        $proveedorId=rand(1,3);

        $nuevaFactura=new Factura();
        $nuevaFactura->Producto_Id=$idProducto;
        $nuevaFactura->Proveedor_Id=$proveedorId;
        $nuevaFactura->Tienda_Id=session()->get("TIENDA");
        $nuevaFactura->save();

        return redirect()->route("Comprar");
    }

    public function productosCRUD(Request $request,$tipo,$id=0){
        switch ($tipo) {
            case "ACTUALIZAR":
            $datosProducto=$request->all();
            $idTienda=session()->get('TIENDA');
            $nombreTienda=Tienda::findOrFail($idTienda);
            $cantidadProductosTotales=Producto::where("Tienda_Id",$idTienda)->count();
            $producto=Producto::findOrFail($id);

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
                $datosProducto['Tienda_Id']=$idTienda;

                //Actualizando el producto
                $producto->update($datosProducto);
            }

                break;

            case "CREAR":
                $datosProducto=$request->all();
                $idTienda=session()->get('TIENDA');
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
                    $datosProducto['Tienda_Id']=$idTienda;
                }

                //Almacennando los datos en la BBDD
                Producto::create($datosProducto);
                break;

            case "ELIMINAR":
                Producto::destroy($id);
            break;

            default:

            return redirect()->route("MisProductos");
            break;
        }

        return redirect()->route("MisProductos");
    }

}
