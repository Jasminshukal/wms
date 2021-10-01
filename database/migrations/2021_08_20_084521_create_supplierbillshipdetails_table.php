<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierbillshipdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplierbillshipdetails', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('supplier_id')->unsigned();
            $table->string('baddress1');
            $table->string('baddress2')->nullable();
            $table->string('bcity');
            $table->string('bregion');
            $table->string('bcountry');
            $table->string('bzipcode', 20);
            $table->string('bphone', 50);
            $table->tinyInteger('shipsameasbill')->default(0)->comment('0 - no   1 - yes');
            $table->string('saddress1');
            $table->string('saddress2')->nullable();
            $table->string('scity');
            $table->string('sregion');
            $table->string('scountry');
            $table->string('szipcode', 20);
            $table->string('sphone', 50);
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
        Schema::dropIfExists('supplierbillshipdetails');
    }
}
