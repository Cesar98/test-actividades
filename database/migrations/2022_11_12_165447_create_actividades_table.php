<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen', 255);
            $table->string('titulo', 64);
            $table->string('descripcion', 255);
            $table->date('fecha_disponibilidad_inicio');
            $table->date('fecha_disponibilidad_fin');
            $table->double('precio_unitario', 10,2);
            $table->integer('popularidad')->unsigned();
            $table->string('actividades_relacionadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
