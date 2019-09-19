<?php

use Illuminate\Http\Request;


//=================Validacion de usuarios con la base de datos=======================
Route::post('login/{nombreTienda}/{contrasegna}', "RegistroController@login");

Route::post("registro/crearUsuario","RegistroController@crearUsuario");

//=================Consumir datos cuando se ha iniciado session=======================
Route::get('productos/all', "ProductosController@productosTotales");

Route::get('productos/leer/{idTienda}', "ProductosController@productosUsuario");

Route::get('productos/disponibles/{idTienda}', "ProductosController@productosDisponibles");

Route::get('productos/pedido/{idProducto}', "ProductosController@pedirProducto");

Route::post('productos/pedido/crear/{idUsuario}/{idProducto}', "ProductosController@crearPedido");

Route::post('productos/crear', "ProductosController@productosCrear");

Route::delete('productos/eliminar/{idProducto}', "ProductosController@productoEliminar");

Route::post('productos/actualizar/{idProducto}/{idTienda}', "ProductosController@productoActualizar");

//=================Datos de las facturas y peticiones=======================

Route::get('facturas/usuario/{idTienda}', "FacturasController@facturasUsuario");
