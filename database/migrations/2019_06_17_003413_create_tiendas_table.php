<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tiendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre_Tienda')->nullable(false)->unique();
            $table->string("Contrasena")->nullable(false);
            $table->string("Encargado")->nullable(false);
            $table->string('Pais')->nullable(true)->default("Desconocido");
            $table->string("Estado")->nullable(true)->default("Desconocido");
            $table->string("Colonia")->nullable(true)->default("Desconocido");
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
        Schema::table('Tiendas', function (Blueprint $table) {
            $table->dropIfExists('Tiendas');
        });
    }
}
