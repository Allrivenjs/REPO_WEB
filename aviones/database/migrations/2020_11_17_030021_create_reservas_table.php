<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('vuelo_id')->unsigned();
            $table->integer('tarifa_id')->unsigned();
            $table->integer('avion_id')->unsigned();
            $table->integer('tipoReserva_id')->unsigned();
            $table->timestamp('fecha');
            $table->string('estado');
            $table->integer('cantidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->foreign('tarifa_id')->references('id')->on('tarifas');
            $table->foreign('avion_id')->references('id')->on('aviones');
            $table->foreign('tipoReserva_id')->references('id')->on('tipo_reservas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservas');
    }
}
