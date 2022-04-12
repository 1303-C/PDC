<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTCaag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_caag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Actividades',75);
            $table->string('fecha_programada', 45);
            $table->string('fecha_cierre', 45);
            $table->string('porcentaje', 45);
            $table->string('fecha_reprogramada', 45);
            $table->string('analisis_indicador',75);
            $table->unsignedInteger('ca_estado_id');
            $table->foreign('ca_estado_id','fk_estado_ca')->references('id')->on('t_estados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_caag');
    }
}
