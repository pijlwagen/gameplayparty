<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBioscoopOpeningstijdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bioscoop_openingstijden', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bioscoop_id');
            $table->string('day', 3);
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
        Schema::dropIfExists('bioscoop_openingstijden');
    }
}
