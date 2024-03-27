<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;


// Helpers 
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //primo modo per eseguire in modo sicuro il truncate
        Schema::disableForeignKeyConstraints();
        user::truncate();
        Schema::enableForeignKeyConstraints();

        //nomi plausibili per le attività
        $name = [
            'Galloway', // Fast Food 0
            'BurgerKong', // Americano 1
            'MucDonalds', // Americano 2
            'Da Albert', // Pizzeria 3
            'Korallo', // Pesce 4
            'RoadMouse', // BBQ 5
            'StefanoPizza', // Pizzeria 6
            'Cinatown', // Cinese 7
            'Da Mario', // Pizzeria 8
            'Fork', // Etnica 9
            'Mindujo', // Iberica 10
            'Burger Bistro', // Americano 11
            'Pizzeria Deliziosa', // Pizzeria 12
            'Slice & Grill', // BBQ 13
            'Crispy Crust Cafe', // Messicano 14
            'Pizzamania', // Pizzeria 15
            'Burger Barbecue', // Americano 16
            'Sushi Sinfonia', // Sushi 17
            'La Bella Italia', // Paninoteca 18
            'Sushi Palace' // Sushi 19
        ];
        //popolazione table  user
        for ($i=0; $i < 20; $i++) {

            $resturant_name = $name[$i];

            $email = fake()->email;
            $password = 'password';
            //utilizzo faker per creare un indirizzo ITA e uso explode per prendere la prima parte
            //senza il CAP e la città
            //adress diventa un array con key 0 e 1, successivamente usero l'array in posizione 0
            $address = explode("\n",Faker::create('it_IT')->address());
            //inizializzo a stringa vuota vatNumber
            $vatNumber = '';
            //non utilizzo fake()->vat perchè il fortmato è IT#############
            //con il ciclo creo una partita iva composta solo da numeri
            for ($j=0; $j < 11; $j++) { 
                $vatNumber .= rand(0,9);
            };

            $resturantImage = "immagine";

            $user = user::create([
                'resturant_name'=> $resturant_name,
                'email'=> $email,
                'password'=> $password,
                'address'=> $address[0],
                'vat_number'=> $vatNumber,
                'resturant_image'=> $resturantImage 
            ]);
        }
    }
}
