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
        Schema::create('dish_order', function (Blueprint $table) {
            
            $table->unsignedBigInteger('dish_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedTinyInteger('quantity');
            
            // foreign key che fa riferimento all'ID del piatto nella table "dishes"
            $table->foreign('dish_id')
            ->references('id')
            ->on('dishes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            // foreign key che fa riferimento all'ID del piatto nella table "orders"
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            // primary key composta da dish_id e order_id
            $table->primary(['dish_id', 'order_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_order');
    }
};
