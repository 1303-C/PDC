<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTCcgr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ccgr', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_control', 45);
            $table->string('fecha_evaluacion', 45);
            $table->string('fecha_actual', 45);
            $table->string('fecha_real_evaluacion', 45);
            $table->string('porcentaje_avances',75);
            $table->string('evidencia_avance', 45);
            $table->unsignedInteger('cc_estado_id');
            $table->foreign('cc_estado_id','fk_estado_cc')->references('id')->on('t_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('cc_frecuencia_controles_id');
            $table->foreign('cc_frecuencia_controles_id','fk_frecuenciacontroles_cc')->references('id')->on('t_frecuencia_controles')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_ccgr');
    }
}
