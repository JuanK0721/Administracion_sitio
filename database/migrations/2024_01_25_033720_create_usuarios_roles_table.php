<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('idUsuario')->nullable();
            $table->integer('idRol')->nullable();
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
        Schema::dropIfExists('usuarios_roles');
    }
}
