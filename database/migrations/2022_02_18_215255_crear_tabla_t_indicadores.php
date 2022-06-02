<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTIndicadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_indicador',100);
            // $table->string('meta',45);
            $table->unsignedInteger('frecuencia_control_id');
            $table->foreign('frecuencia_control_id','fk_frecuenciacontrol')->references('id')->on('t_frecuencia_controles')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('areas_id');
            $table->foreign('areas_id','fk_areas')->references('id')->on('t_areas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_indicadores');
    }
}
