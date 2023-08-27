<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadetes', function (Blueprint $table) {
            //$table->id();
            $table->string('id',6);
            $table->string('num_cadete',6)->primary();
            $table->string('nombre',15);
            $table->string('apellido',15);
            $table->string('dni',9);
            $table->string('telefono',15);
            $table->string('direcc',60)->nullable();
            $table->string('status',1);
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
        Schema::dropIfExists('cadetes');
    }
}
