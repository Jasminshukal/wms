<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('taxcode', 100)->unique();
            $table->decimal('pricefrom', $precision = 5, $scale = 2);
            $table->decimal('priceto', $precision = 5, $scale = 2);
            $table->decimal('vat', $precision = 5, $scale = 2);
            $table->decimal('cst', $precision = 5, $scale = 2);
            $table->decimal('cstformc', $precision = 5, $scale = 2);
            $table->decimal('additionaltax', $precision = 5, $scale = 2);
            $table->string('region');
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
        Schema::dropIfExists('taxes');
    }
}
