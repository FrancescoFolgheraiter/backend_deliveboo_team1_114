<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Order;
use App\Models\Dish;
use App\Models\User;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $orders = Order::all();

        foreach ($orders as $order) {
            // estraggo un utente casuale
            $user = $users->random();

            // Ottengo un numero random da 1 a 5 di piatti possibili dell'utente
            $userDishes = $user->dishes()->inRandomOrder()->take(rand(1, 5))->get();
            $quantity = rand(1, 5);
            // Allega i piatti dell'utente selezionato all'ordine corrente
            $order->dishes()->attach($userDishes->pluck('id'),['quantity' => $quantity]);
        }
    }
}
