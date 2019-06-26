<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmpresasEnvios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("Nombre_Empresa");
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
        Schema::table('EmpresasEnvios', function (Blueprint $table) {
            $table->dropIfExists('EmpresasEnvios');
        });
    }
}
