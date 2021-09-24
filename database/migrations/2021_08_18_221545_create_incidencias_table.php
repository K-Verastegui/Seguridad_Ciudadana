<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->integer('dni');
            $table->foreign('dni')->references('dni')->on('personas');
            $table->string('categoria', 50);
            $table->string('longitud', 50);
            $table->string('latitud', 50);
            $table->text('descripcion');
            $table->longText('foto')->nullable();
            $table->text('seguido')->nullable()->default('Alertado');
            $table->text('estado')->nullable();
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
        Schema::dropIfExists('incidencias');
    }
}
