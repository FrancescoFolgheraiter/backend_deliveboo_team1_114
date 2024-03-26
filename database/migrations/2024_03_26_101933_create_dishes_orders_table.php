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
        Schema::create('dishes_orders', function (Blueprint $table) {
            
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedTinyInteger('quantity');
            
            
            $table->foreign('dish_id')
            ->references('id')
            ->on('dishes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->primary(['dish_id', 'order_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes_orders');
    }
};