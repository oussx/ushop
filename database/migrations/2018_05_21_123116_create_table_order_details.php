<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('order_id');
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
			$table->integer('quantity');
			$table->text('price');
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
        Schema::dropIfExists('orderdetails');
    }
}
