<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplierdetails', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('supplier_id')->unsigned();
            $table->string('pan', 50);
            $table->string('tin', 50);
            $table->string('cstno', 50);
            $table->string('stno', 50);
            $table->string('gstinno', 50);
            $table->dateTime('purchaseexpirydate', $precesion = 0);
            $table->tinyInteger('taxexempted')->default(0)->comment('0 - no   1 - yes');
            $table->tinyInteger('regstdealer')->default(0)->comment('0 - no   1 - yes');
            $table->tinyInteger('tcsadditionenabled')->default(0)->comment('0 - no   1 - yes');
            $table->tinyInteger('providescform')->default(1)->comment('0 - no   1 - yes');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplierdetails');
    }
}
