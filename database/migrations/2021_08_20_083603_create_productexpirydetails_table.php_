<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductexpirydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productexpirydetails', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('product_id')->unsigned();
            $table->tinyInteger('expirable')->default(0)->comment('0 - not expirable   1 - expirable');
            $table->tinyInteger('determineexpiryfrom')->default(0)->comment('0 - from manufacturing date  1 - from expiry date  2 - from category');
            $table->string('shelflife', 100)->nullable();
            $table->string('dispatchexpirytolerance', 100)->nullable();
            $table->string('grnexpirytolerance', 100)->nullable();
            $table->string('returnexpirytolerance', 100)->nullable();
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
        Schema::dropIfExists('productexpirydetails');
    }
}
