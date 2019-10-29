<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 512);
            $table->string('last_name', 512);
            $table->string('email', 512);
            $table->string('phone', 512);
            $table->string('address', 512);
            $table->string('zip_code', 512);
            $table->string('city', 512);
            $table->integer('kids')->default(0);
            $table->integer('normal')->default(0);
            $table->integer('youth')->default(0);
            $table->integer('elder')->default(0);
            $table->integer('special')->default(0);
            $table->bigInteger('time');
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
        Schema::dropIfExists('reservations');
    }
}
