<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('zaal_id')->references('id')->on('zalen')->onDelete('cascade');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->float('price');
            $table->boolean('available')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelocks');
    }
}
