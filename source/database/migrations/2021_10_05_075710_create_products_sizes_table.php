<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_sizes');
    }
}
