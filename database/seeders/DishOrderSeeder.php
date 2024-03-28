<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Order;
use App\Models\Dish;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // recupero tutti gli orders dal database
        $orders = Order::all();

        // recupero tutti i piatti dal database
        $dishes = Dish::all();

        // itero su ciascun ordine 
        foreach ($orders as $order) {

            // seleziono in modo casuale un piatto da 1 a 4
            $randomDishes = rand(1, 4);

            // mescolo tramite shuffle() e prendo casualmente un piatto
            $selectedDishes = $dishes->shuffle()->take($randomDishes);

            // itero sui piatti selezionati per ordine 
            foreach ($selectedDishes as $dish) {

                // seleziono in modo casuale una quantità da 1 a 10
                $quantity = rand(1, 5);

                // associo per ogni ordine un piatto e ne specifico la quantità
                $order->dishes()->attach($dish, ['quantity' => $quantity]);
            };
        };
    }
}
