<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Index');
});

//================URL Para la impresion de facturas=============================
Route::get('factura/imprimir/{idFactura}',"FacturasController@verFactura");

Route::post('productos/crear', "ProductosController@productosCrear");


