<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZalenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bioscoop_id');
            $table->integer('seats')->default(0);
            $table->integer('handicapped_seats')->default(0);
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
        Schema::dropIfExists('zalen');
    }
}
