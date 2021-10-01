<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('warehouse_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('supplieragreement_id')->unsigned();
            $table->integer('user_id')->unsigned();
            //$table->integer('product_id', 11);
            $table->integer('channel_id')->unsigned();
            $table->string('pocode', 100);
            $table->decimal('subtotal', $precision = 10, $scale = 2);
            $table->string('barcodeidentificationstr', 200)->unique();
            $table->decimal('logisticcharges', $precision = 10, $scale = 2);
            $table->decimal('estimatedtcs', $precision = 10, $scale = 2);
            $table->decimal('gtotal', $precision = 10, $scale = 2);
            $table->tinyInteger('status')->default(0)->comment('0 - initiated   1 - payment done, 2 - ready for dispatch, 3 - delivered, 4 - completed');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('supplieragreement_id')->references('id')->on('supplieragreements');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('purchaseorders');
    }
}
