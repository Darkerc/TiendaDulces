<html>
    <head>
        <!-- El punto al final de href indica que trae la ruta del servidor -->
        <link type="text/css" rel="stylesheet" href="./css/FacturasEstilos.css" />
    </head>
    <body>
        <div class="titularPDF">Factura del producto</div>
        <div class="contenedorPDF">
            <div class="contenedorCuerpo">
                <section class="tarjetaProducto">
                    <img src="{{ $rutaImagen }}" class="imagenProducto"/>
                    <div class="imagenNombre">{{ $datosFactura->Producto->Nombre_Producto }}</div>
                    <div class="tarjetaCabecera">
                        <span class="tarjetaItem">Codigo del producto: <small class="itemDato">#{{ $datosFactura->Producto->id }}</small></span>
                        <span class="tarjetaItem">Folio de la factura: <small class="itemDato">#{{ $datosFactura->id }}</small></span>
                        <span class="tarjetaItem">Cantidad: <small class="itemDato">#{{ $datosFactura->Producto->Existencias }}</small></span>
                    </div>
                </section>

                <section class="infoCompra">
                    <div class="datosCompra">
                        <h1 class="tituloCompra">Datos del comprador</h1>
                        <span class="datoItem">Nombre de la tienda: <small class="itemDato">{{ $datosFactura->Tienda_Duena->Nombre_Tienda }}</small></span>
                        <span class="datoItem">ID de la tienda: <small class="itemDato">#{{ $datosFactura->Tienda_Duena->id }}</small></span>
                        <span class="datoItem">Encargado: <small class="itemDato">{{ $datosFactura->Tienda_Duena->Encargado }}</small></span>
                    </div>

                    <div class="datosCompra">
                        <h1 class="tituloCompra">Direccion</h1>
                        <span class="datoItem">Pais: <small class="itemDato">{{ $datosFactura->Tienda_Duena->Pais }}</small></span>
                        <span class="datoItem">Estado: <small class="itemDato">{{ $datosFactura->Tienda_Duena->Estado }}</small></span>
                        <span class="datoItem">Colonia: <small class="itemDato">{{ $datosFactura->Tienda_Duena->Colonia }}</small></span>
                    </div>

                    <div class="datosCompra">
                        <h1 class="tituloCompra">Dia de facturacion</h1>
                        <span class="datoItem">Dia: <small class="itemDato">{{ $datosFactura->Fecha_Compra->format("d") }}</small></span>
                        <span class="datoItem">Mes: <small class="itemDato">{{ $datosFactura->Fecha_Compra->format("m") }}</small></span>
                        <span class="datoItem">Año: <small class="itemDato">{{ $datosFactura->Fecha_Compra->format("y") }}</small></span>
                    </div>
                </section>
            </div>
        </div>
        <span class="contenedorPie">
            <div class="datoItem">Empresa: <span class="itemDato">{{ $datosFactura->Proveedor->Empresa_Envios->Nombre_Empresa }}</span></div>
            <div class="datoItem">ID Proveedor: <span class="itemDato">#{{ $datosFactura->Proveedor->id }}</span></div>
            <div class="datoItem">Nombre proveedor: <span class="itemDato">{{ $datosFactura->Proveedor->Nombre_Proveedor . " " . $datosFactura->Proveedor->Primer_Apellido}}</span></div>
        </span>
</body>
</html>
