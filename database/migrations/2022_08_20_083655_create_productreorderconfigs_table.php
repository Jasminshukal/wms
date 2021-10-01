<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductreorderconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productreorderconfigs', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('product_id')->unsigned();
            $table->integer('threshold')->comment('max 10000');
            $table->integer('reorderqty')->comment('max 10000');
            $table->tinyInteger('status')->default(1)->comment('0 - inactive   1 - active');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
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
        Schema::dropIfExists('productreorderconfigs');
    }
}
