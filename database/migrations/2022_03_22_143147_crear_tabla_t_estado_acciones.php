<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTEstadoAcciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_estado_acciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_cierre', 45);
            $table->string('codigo_accion', 50);
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id','fk_estado')->references('id')->on('t_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('tipo_acciones_id');
            $table->foreign('tipo_acciones_id','fk_tipo_acciones')->references('id')->on('t_tipo_acciones')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_estado_acciones');
    }
}
