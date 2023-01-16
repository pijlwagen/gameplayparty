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
            $table->foreignId('bioscoop_id')->references('id')->on('bioscopen')->onDelete('cascade');
            $table->string('name', 512);
            $table->string('slug', 512);
            $table->integer('seats')->default(0);
            $table->integer('handicapped_seats')->default(0);
            $table->boolean('atmos')->default(false);
            $table->boolean('3d')->default(false);
            $table->boolean('ultra')->default(false);
            $table->string('dolby')->default('5.1');
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
