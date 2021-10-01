<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductlistingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productlistings', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('product_id')->unsigned();
            $table->integer('channel_id')->unsigned()->comment('here  channel id means id of selling channel, for e.g. flipkart, amazon etc.');
            $table->string('productlistingcode', 100)->unique();
            $table->decimal('sellingprice', $precision = 10, $scale = 2);
            $table->integer('qtyforsale');
            $table->tinyInteger('disabled')->default(0)->comment('0 - not disabled   1 - disabled');
            $table->tinyInteger('manuallydisabled')->default(0)->comment('0 - not disabled   1 - disabled');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('channel_id')->references('id')->on('channels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productlistings');
    }
}
