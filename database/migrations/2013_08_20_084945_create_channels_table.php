<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            //$table->id();
            $table->increments('id', 11);
            $table->integer('admin_id')->unsigned();
            //$table->increments('id', 11);
            //$table->integer('admin_id');
            $table->string('name');
            $table->string('code', 50)->unique();
            $table->tinyInteger('status')->default(1)->comment('0 - disabled   1 - enabled');
            $table->tinyInteger('isdeleted')->default(0)->comment('0 - not deleted   1 - deleted');
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);            
            
            //$table->timestamps();
            
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
