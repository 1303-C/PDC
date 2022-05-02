<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTMetasIndicador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_metas_indicador', function (Blueprint $table) {
            $table->string('mes',45);
            $table->string('año',45);
            $table->string('meta',45);
            $table->unsignedInteger('t_indicadores_id');
            $table->foreign('t_indicadores_id','fk_t_indicadores')->references('id')->on('t_indicadores')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_metas_indicador');
    }
}
