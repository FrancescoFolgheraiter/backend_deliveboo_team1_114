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
        Schema::create('dishes', function (Blueprint $table) {

            
            $table->id();
            $table->string('name', 64);
            $table->text('description')->nullable();
            $table->text('ingredients');

            // prezzo del piatto (max 999.99 per ora)
            $table->decimal('price', 5, 2)->unsigned();

            // visibilità impostata a true
            $table->boolean('visible')->default(true);
            $table->string('image', 255)->nullable();
            $table->unsignedBigInteger('user_id');

            // foreign key dell'utente che ha creato il piatto
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
