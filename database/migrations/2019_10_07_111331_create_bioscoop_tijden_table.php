<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioscoopTijdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bioscoop_tijden', function (Blueprint $table) {
            $table->foreignId('bioscoop_id')->references('id')->on('bioscopen')->onDelete('cascade');
            $table->integer('start');
            $table->integer('end');
            $table->integer('day');
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
        Schema::dropIfExists('bioscoop_tijden');
    }
}
