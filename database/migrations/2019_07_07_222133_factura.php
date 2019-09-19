<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Producto_Id')->nullable(false);
            $table->string("Proveedor_Id")->nullable(false);
            $table->string("Tienda_Id")->nullable(false);
            $table->dateTime('Fecha_Compra')->useCurrent();
            $table->string("created_at")->timestamp();
            $table->string("updated_at")->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropIfExists('facturas');
        });
    }
}
