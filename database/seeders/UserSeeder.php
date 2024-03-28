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
            'Galloway', // Fast Food 1
            'BurgerKong', // Americano 2
            'MucDonalds', // Americano 3
            'Da Albert', // Pizzeria 4
            'Korallo', // Pesce 5
            'RoadMouse', // BBQ 6
            'StefanoPizza', // Pizzeria 7
            'Cinatown', // Cinese 8
            'Da Mario', // Pizzeria 9
            'Fork', // Etnica 10
            'Mindujo', // Iberica 11
            'Burger Bistro', // Americano 12
            'Pizzeria Deliziosa', // Pizzeria 13
            'Slice & Grill', // BBQ 14
            'Crispy Crust Cafe', // Messicano 15
            'Pizzamania', // Pizzeria 16
            'Burger Barbecue', // Americano 17
            'Sushi Sinfonia', // Sushi 18
            'La Bella Italia', // Paninoteca 19
            'Sushi Palace' // Sushi 20
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
