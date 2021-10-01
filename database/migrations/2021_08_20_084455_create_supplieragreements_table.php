<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplieragreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplieragreements', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('supplier_id')->unsigned()->comment('One supplier can have many agreements');
            $table->string('name');
            $table->dateTime('startdate', $precesion = 0);
            $table->dateTime('enddate', $precesion = 0);
            $table->text('details');
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
        Schema::dropIfExists('supplieragreements');
    }
}
