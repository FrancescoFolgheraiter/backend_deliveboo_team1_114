<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Order;

class TotalPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $orders = Order::all();
        //mi serve per definire un 20 % delle date create 
        //con la data di oggi vedi logica di OrderSeeder
        $populated = 10;

        foreach ($orders as $order){
            //viene assegnata qui la data perchè altrimenti veniva sovrascritta se veniva
            //assgnata nel seeder di Order

            $randomNumber = fake()->numberBetween(1, 100);
            if ($randomNumber <= $populated) {
                // Se la condizione è vera, imposta la data odierna con un orario fake
                $order->date = now()->startOfDay()->toDateString().' '.fake()->time();
            }
            else{
                $order->date = fake()->dateTimeBetween('2022-01-01', 'now')->format('Y-m-d H:i:s');
            }
            //inizializzo una variabile total price total price
            $totalPrice = 0;
            //ciclo tutti gli ordini per aggiornare i prezzi
            foreach ($order->dishes as $dish){
                //operazione per aggiornare i prezzi
                $totalPrice += $dish->price * $dish->pivot->quantity;
            }   
            //salvo il total price
            $order->total_price = $totalPrice;
            $order->save();
        }      
    }
}
