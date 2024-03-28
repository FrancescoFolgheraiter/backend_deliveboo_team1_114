<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Order;
use App\Models\User;

// Helpers 
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // disabilito i vincoli con le foreign keys
        Schema::disableForeignKeyConstraints();

        // cancello tutti i dati presenti nella table
        Order::truncate();

        // riabilito i vincoli con le foreign keys
        Schema::enableForeignKeyConstraints();

        // mi recupero i dati da orders.php tramite config
        $ordersData = config('orders');
        
        foreach ($ordersData as $customer) {

            // creo un nuovo order
            $order = new Order();

            // genero dei dati fake tramier faker e assegno gli elementi presenti nell'array 
            $order->date = fake()->dateTimeBetween('2024-01-01', 'now')->format('Y-m-d H:i:s');
            $order->note = fake()->sentence();
            $order->total_price = fake()->randomFloat(2, 1, 200);
            // dd($order->dishes);
            // foreach ($customer->$dishes as $dish){
                
            // }
            $order->name = $customer['nome'];
            $order->surname = $customer['cognome'];
            $order->address = $customer['indirizzo'];
            $order->phone_number = $customer['numero_di_telefono'];
            $order->save();
        };
    }
}
