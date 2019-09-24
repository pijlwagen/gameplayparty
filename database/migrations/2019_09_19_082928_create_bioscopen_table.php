<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioscopenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bioscopen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 256);
            $table->string('city', 256);
            $table->string('address', 548);
            $table->string('zip', 6);
            $table->string('phone', 256);
            $table->longText('description');
            $table->string('slug', 256);
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
        Schema::dropIfExists('bioscopen');
    }
}
