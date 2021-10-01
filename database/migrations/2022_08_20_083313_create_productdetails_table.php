<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdetails', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('product_id')->unsigned();
            $table->string('url')->nullable();
            $table->string('color', 50)->nullable();
            $table->string('size', 50)->nullable();
            $table->string('length', 50)->comment('in mm')->nullable();
            $table->string('width', 50)->comment('in mm')->nullable();
            $table->string('height', 50)->comment('in mm')->nullable();
            $table->string('weight', 50)->comment('in gram')->nullable();
            $table->text('itemdetailsfields');
            $table->string('ean', 50)->nullable();
            $table->string('upc', 50)->nullable();
            $table->string('isbn', 50)->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('lotsize')->default(1);
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdetails');
    }
}
