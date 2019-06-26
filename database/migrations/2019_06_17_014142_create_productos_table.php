<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tienda_Id')->nullable(false);
            $table->string("Nombre_Producto")->nullable(false);
            $table->string("Precio")->nullable(false);
            $table->string('Existencias')->nullable(false);
            $table->string("Imagen_Producto")->nullable(false);
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
        Schema::table('Productos', function (Blueprint $table) {
            $table->dropIfExists('Productos');
        });
    }
}
