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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->text('note')->nullable();

            // prezzo del piatto (max 9999.99 per ora)
            $table->decimal('total_price', 6, 2)->unsigned();
            $table->string('name', 64);
            $table->string('surname', 64);
            $table->string('address', 128);
            $table->string('phone_number', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
