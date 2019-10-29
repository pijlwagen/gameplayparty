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
            $table->bigInteger('zaal_id');
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
