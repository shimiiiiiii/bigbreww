<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_has_orders', function (Blueprint $table) {
            $table->bigIncrements('products_has_orders_id');
            $table->unsignedBigInteger('product_id')->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        
            // $table-
            // $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_has_orders');
    }
};
