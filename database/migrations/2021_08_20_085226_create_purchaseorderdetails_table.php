<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseorderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorderdetails', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('purchaseorder_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('units');
            $table->decimal('unitprice', $precision = 10, $scale = 2);
            $table->decimal('discount', $precision = 10, $scale = 2);
            $table->integer('tax_id')->unsigned();
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('purchaseorder_id')->references('id')->on('purchaseorders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('tax_id')->references('id')->on('taxes');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseorderdetails');
    }
}
