<?php

//-----------------------Rutas de acceso general a la pagina---------------------------------

Route::get('/','TiendasController@index')->name('Index');

Route::get('/Registro','TiendasController@registro')->name('Registro');

//-----------------------Rutas de acceso, validacion o creacion de recursos ---------------------------------

Route::post('/','TiendasController@creaUsuario')->name('crear');
Route::post('/Productos','TiendasController@acceso')->name('acceso');
Route::get('/CerrarSesion','TiendasController@cerrarSesion')->name('CerrarSesion');

//-----------------------Rutas cuando se realiza un logueo exitoso---------------------------------

Route::get('/Productos','TiendasController@productos')->name('Productos');

Route::get('/Comprar','TiendasController@comprar')->name('Comprar');

Route::get('/MisFacturas','TiendasController@misFacturas')->name('MisFacturas');

Route::get('/MisProductos','TiendasController@misProductos')->name('MisProductos');

Route::get('/CreaProducto','TiendasController@creaProducto')->name('CreaProducto');

Route::get('/VerFactura/{idFactura}','TiendasController@verFactura')->name('VerFactura');

//-----------------------Operaciones con los productos---------------------------------

Route::get('Producto/Pedido/{idProducto}','TiendasController@pedidos')->name('Pedidos');
Route::get('Producto/ActualizaProducto/{idProducto}','TiendasController@actualizaProducto')->name('actualizaProducto');
Route::post('Producto/CreaFactura/{idProducto}','TiendasController@creaFactura')->name('CreaFactura');
Route::post('/Comprar','TiendasController@subirProducto')->name('subirproducto');

Route::any('/Producto/{tipo}/{idProducto?}','TiendasController@productosCRUD')->name('productosCRUD');


