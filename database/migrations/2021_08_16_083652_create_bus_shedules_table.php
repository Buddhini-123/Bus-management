<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_shedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_route_id');
            $table->foreign('bus_route_id')->references('id')->on('bus_routes');
            $table->string('direction');
            $table->integer('start_timestamp');
            $table->integer('end_timestamp');
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
        Schema::dropIfExists('bus_shedules');
    }
}
