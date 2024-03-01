<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombreRol', 50)->nullable();
            $table->string('estado', 1)->nullable();
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
        Schema::dropIfExists('roles');
    }
}
