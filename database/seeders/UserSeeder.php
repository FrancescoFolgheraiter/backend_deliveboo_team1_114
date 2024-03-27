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
            'Galloway',
            'BurgerKong',
            'MucDonalds',
            'Da Albert',
            'Korallo',
            'Borgo Nuovo',
            'RoadMouse',
            'StefanoPizza',
            'Cinatown',
            'Da Mario',
            'Fork',
            'Mindujo',
            'Pizza Paradise',
            'Burger Bistro',
            'Pizzeria Deliziosa',
            'Slice & Grill',
            'Crispy Crust Cafe',
            'Pizzamania',
            'Burger Bonanza',
            'Burger Barbecue',
            'Sushi Sinfonia',
            'La Bella Italia',
            'Sushi Palace'
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
