<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTProceso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('efectividad',45);
            $table->string('oportunidad',45);
            $table->string('calificacion',45);
            $table->string('calificacion_total',45);
            $table->string('desempeño',45);
            $table->unsignedInteger('nombre_procesos_id');
            $table->foreign('nombre_procesos_id','fk_nombreproceso')->references('id')->on('t_nombre_procesos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_procesos');
    }
}
