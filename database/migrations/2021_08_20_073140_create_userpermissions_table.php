<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpermissions', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->increments('id', 11);
            $table->integer('userrole_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->tinyInteger('add')->default(0);
            $table->tinyInteger('edit')->default(0);
            $table->tinyInteger('view')->default(0);
            $table->tinyInteger('delete')->default(0);
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);

            $table->foreign('userrole_id')->references('id')->on('userroles'); 
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('module_id')->references('id')->on('modules');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpermissions');
    }
}
