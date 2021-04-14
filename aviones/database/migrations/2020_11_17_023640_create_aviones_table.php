<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoid');
            $table->integer('empresa_id')->unsigned();
            $table->string('modelo');
            $table->integer('capacidad');
            $table->integer('disponibilidad');
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aviones');
    }
}
