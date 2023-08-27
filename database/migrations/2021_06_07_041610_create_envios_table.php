<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            //$table->id();
            $table->string('id_ship',12)->primary();
            $table->dateTime('date_in', $precision = 0);
            $table->string('status',20);
            $table->string('sender_id',10);
            $table->string('order_id',10)->nullable();
            $table->string('street_name',30);
            $table->integer('street_number');
            $table->string('comment',100)->nullable();
            $table->integer('zip_code');
            $table->string('city',30);
            $table->string('state',30);
            $table->integer('country');
            $table->string('receiver_name',40)->nullable();
            $table->string('receiver_phone',15)->nullable();
            $table->string('description',60)->nullable();
            $table->dateTime('date_first_visit', $precision = 0)->nullable();
            $table->dateTime('date_delivered', $precision = 0)->nullable();
            $table->dateTime('date_not_delivered', $precision = 0)->nullable();
            $table->string('cadete',6)->nullable();
            $table->integer('status_logistica');
            $table->string('comment_logis',40)->nullable();
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
        Schema::dropIfExists('envios');
    }
}
