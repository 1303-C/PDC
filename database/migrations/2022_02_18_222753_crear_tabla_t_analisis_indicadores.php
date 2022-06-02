<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTAnalisisIndicadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_analisis_indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('analisis_indicador',400);
            $table->string('indicador_inverso',45);
            $table->string('meta',45);
            $table->string('equivalencia',45);
            $table->string('resultados',45);
            $table->string('desempeño',50);
            $table->unsignedInteger('indicadores_id');
            $table->foreign('indicadores_id','fk_indicadores')->references('id')->on('t_indicadores')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('usuarios_id');
            $table->foreign('usuarios_id','fk_usuarios')->references('id')->on('t_usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('estados_id');
            $table->foreign('estados_id','fk_estados')->references('id')->on('t_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('metas_id');
            $table->foreign('metas_id','fk_metas')->references('id')->on('t_metas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_analisis_indicadores');
    }
}
