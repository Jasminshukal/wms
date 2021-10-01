<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerdiscountgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerdiscountgroups', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('customer_id')->unsigned()->comment('each customer wise assigned discount group will have seperate record');
            $table->integer('discount_id')->unsigned();
            $table->string('discountgroupcode', 100)->unique();
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerdiscountgroups');
    }
}
