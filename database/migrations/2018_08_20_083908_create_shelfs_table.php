<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelfs', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('skucode', 100);
            $table->string('capacity', 100)->nullable();
            $table->string('barcodeidentificationstr')->comment('will be used in barcode generate and comparison functionalities');
            $table->tinyInteger('status')->default(1)->comment('0 - inactive   1 - active');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shelfs');
    }
}
