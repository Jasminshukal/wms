<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('name');
            $table->text('description');
            $table->string('brand');
            $table->string('skucode',100)->unique();
            $table->string('scannableidentifier');
            $table->integer('warehouse_id')->unsigned();
            $table->integer('shelf_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('discount_id')->nullable()->unsigned();
            $table->decimal('baseprice', $precision = 10, $scale = 2);
            $table->decimal('mrprice', $precision = 10, $scale = 2);
            $table->decimal('costprice', $precision = 10, $scale = 2);
            $table->string('hsn', 200);
            $table->tinyInteger('producttype')->default(0)->comment('0 - single   1 - bundle');
            $table->string('batchgroupcode', 100);
            $table->string('tat', 100);
            $table->tinyInteger('status')->default(1)->comment('0 - inactive   1 - active');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
            $table->dateTime('manufacturingdate', $precesion = 0)->nullable();
            $table->dateTime('expirydate', $precesion = 0)->nullable();
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('shelf_id')->references('id')->on('shelfs');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
