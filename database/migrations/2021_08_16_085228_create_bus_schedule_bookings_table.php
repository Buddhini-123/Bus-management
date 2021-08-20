<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusScheduleBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedule_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_seats_id');
            $table->foreign('bus_seats_id')->references('id')->on('bus_seats');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bus_schedule_id');
            $table->foreign('bus_schedule_id')->references('id')->on('bus_shedules');
            $table->integer('seat_number');
            $table->double('price', 8, 2);
            $table->string('status');
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
        Schema::dropIfExists('bus_schedule_bookings');
    }
}
