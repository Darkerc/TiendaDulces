<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Empresa_Id')->nullable(false);
            $table->string("Nombre_Proveedor")->nullable(false);
            $table->string("PrimerApellido")->nullable(false);
            $table->string('SegundoApellido')->nullable(false);
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
        Schema::table('Proveedores', function (Blueprint $table) {
            $table->dropIfExists('Proveedores');
        });
    }
}
