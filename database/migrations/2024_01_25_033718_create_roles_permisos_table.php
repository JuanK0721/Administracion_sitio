<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('idRol')->nullable();
            $table->integer('idPermiso')->nullable();
            $table->string('usuarioCreacion', 50)->nullable();
            $table->dateTime('fechaCreacion')->nullable();
            $table->string('usuarioModificacion', 50)->nullable();
            $table->dateTime('fechaModificacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permisos');
    }
}
