<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            //$table->integer('id')->primary();
            $table->integer('id')->autoIncrement();
            $table->string('nombres', 150)->nullable();
            $table->string('apellidos', 150)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('login', 50)->nullable();
            $table->string('password', 150)->nullable();
            $table->string('foto', 50)->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
