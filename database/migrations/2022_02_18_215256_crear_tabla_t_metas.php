<?php

use Cron\MonthField;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTMetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta',45);
            $table->string('mes',45);
            $table->unsignedInteger('indicadores_id');
            $table->foreign('indicadores_id','fk_indicadores_meta')->references('id')->on('t_indicadores')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('t_metas');
    }
}
