<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->dateTime('startDateTime');
            $table->dateTime('endDateTime');
            $table->integer('flightNumber')->nullable();
            $table->string('inbound');
            $table->string('outbound');
            $table->integer('id_pilot')->nullable();
            $table->integer('id_passager')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
