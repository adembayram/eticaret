<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->unique();
            $table->boolean('enable_slider')->default(0);
            $table->boolean('enable_opportunity')->default(0);
            $table->boolean('enable_featured')->default(0);
            $table->boolean('enable_bestseller')->default(0);
            $table->boolean('enable_discounted')->default(0);
            $table->string('product_image',255);
            $table->string('product_image_to',255);
            $table->timestamps();

            //$table->foreign('unit_id')->references('id')->on('units_measure')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
