<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersProductlistingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_productlistings', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('supplier_id')->unsigned();
            $table->integer('productlisting_id')->unsigned();
            //$table->id();
            //$table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('productlisting_id')->references('id')->on('productlistings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers_productlistings');
    }
}
