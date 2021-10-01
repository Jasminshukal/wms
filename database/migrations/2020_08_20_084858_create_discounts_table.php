<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('name');
            $table->string('disccode', 100)->unique();
            $table->tinyInteger('disctype')->default(0)->comment('0 - flat   1 - percentage');
            $table->decimal('discvalue', $precision = 5, $scale = 2);
            $table->tinyInteger('isgroupdiscount')->default(0)->comment('0 - no   1 - yes');
            $table->integer('noofusedby')->length(5)->unsigned();
            $table->tinyInteger('status')->default(1)->comment('0 - disabled   1 - enabled');
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
        Schema::dropIfExists('discounts');
    }
}
