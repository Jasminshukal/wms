<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcategories', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('name')->unique();
            $table->string('code', 50);
            $table->integer('parentcategory_id')->length(11)->unsigned();
            $table->string('gsttaxtypecode', 50);
            $table->string('taxtypecode', 50);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('isdeleted')->default(1);
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
        Schema::dropIfExists('productcategories');
    }
}
