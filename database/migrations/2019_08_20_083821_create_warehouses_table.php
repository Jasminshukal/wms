<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('user_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->tinyInteger('warehousetype')->default(1)->comment('0 - without channel wise   1 - channel wise');
            $table->integer('channel_id')->unsigned();
            $table->string('name');
            $table->string('identificationcode', 100)->unique();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('region');
            $table->string('country');
            $table->string('zipcode', 50);
            $table->string('phone', 50);
            $table->string('contactemail');
            $table->tinyInteger('status')->default(1)->comment('0 - inactive   1 - active');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->id();
            //$table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('warehouses');
    }
}
