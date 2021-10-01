<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('address')->nullable(true);
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('zipcode',20);
            $table->integer('userrole_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('isdeleted')->default(0);
            $table->dateTime('created_at', $precesion = 0);
            $table->dateTime('updated_at', $precesion = 0);
            //$table->timestamp('email_verified_at')->nullable();
            //$table->rememberToken();
            //$table->timestamps();

            $table->foreign('userrole_id')->references('id')->on('userroles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
