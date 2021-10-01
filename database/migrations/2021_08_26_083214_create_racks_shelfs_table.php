<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacksShelfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racks_shelfs', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('rack_id')->unsigned();
            $table->integer('shelf_id')->unsigned();
            //$table->id();
            //$table->timestamps();
            $table->foreign('shelf_id')->references('id')->on('shelfs');
            $table->foreign('rack_id')->references('id')->on('racks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racks_shelfs');
    }
}
