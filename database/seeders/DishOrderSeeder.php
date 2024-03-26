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
        $orders = Order::all();

        $dishes = Dish::all();

        foreach ($orders as $order) {
            $randomDishes = rand(1, 4);
            $selectedDishes = $dishes->shuffle()->take($randomDishes);

            foreach ($selectedDishes as $dish) {
                $quantity = rand(1, 10);
                $order->dishes()->attach($dish, ['quantity' => $quantity]);
            };
        };
    }
}
