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
        
        foreach ($orders as $order){
            $order->total_price = $order->dishes;
            // dd($order->dishes);
            $totalPrice = 0;
            foreach ($order->dishes as $dish){
                $totalPrice += $dish->price * $dish->pivot->quantity;
                // dd($dish->price * $dish->pivot->quantity);
            }   
            $order->total_price = $totalPrice;
            $order->save();
        }      
    }
}
