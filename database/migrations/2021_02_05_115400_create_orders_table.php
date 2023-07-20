<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code',15);
            $table->foreignId('shoppingcart_id')->constrained('shopping_cards')->onDelete('cascade');
            $table->decimal('order_price',10,3);
            $table->string('status',30);
            $table->string('name',255);
            $table->text('address');
            $table->string('phone',15)->nullable();
            $table->string('mobile',15);
            $table->string('bank',20);
            $table->integer('installment');
            $table->string('cargo_name',50)->nullable();
            $table->string('cargo_code',50)->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
