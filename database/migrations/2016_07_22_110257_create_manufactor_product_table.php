<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufactorProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufactor_product', function (Blueprint $table) {
            $table->integer('manufactor_id')->unsigned()->index();
            $table->foreign('manufactor_id')->references('id')->on('manufactors')->ondelete('cascade');

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manufactor_product');
    }
}
