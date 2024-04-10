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

        //per incrementare la consistenza dei dati creiamo molti order attraverso un ciclo for normale
        for ($i=0; $i < 60; $i++) { 
            //il foreach va a recuperarmi dalla struttura dati
            //dei dati verosimili
            foreach ($ordersData as $customer) {
    
                // creo un nuovo order
                $order = new Order();

                //---------gestione inserimento di note nel solo 20% dei casi----------
                $populated = 20;
                $randomNumber = fake()->numberBetween(1, 100);
                //verifico se il numero uscito è maggiore di 20
                if ($randomNumber <= $populated) {
                    // Se la condizione è vera, popola la nota
                    $order->note = fake()->sentence();
                } else {
                    // Altrimenti, lascia la nota vuota
                    $order->note = null;
                }
                //------------fine gestione popolamento $order->note--------
                $order->total_price = 0;
                $order->date = '2024-01-01 12:00:00';
                $order->name = $customer['nome'];
                $order->surname = $customer['cognome'];
                $order->address = $customer['indirizzo'];
                $order->phone_number = $customer['numero_di_telefono'];
                $order->save();
            };
        }
        
    }
}
