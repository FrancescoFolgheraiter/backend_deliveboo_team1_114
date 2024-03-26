<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;


// Helpers 
use Illuminate\Support\Facades\Schema;
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
        $name=[
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
            $address = fake() -> address;

            //inizializzo a stringa vuota vatNumber
            $vatNumber = '';
            for ($i=0; $i < 11; $i++) { 
                $vatNumber .= rand(0,9);
            };
            $resturantImage = "immagine";

            $user = user::create([
                'resturant_name'=>$resturant_name,
                'email'=>$email,
                'password'=> $password,
                'address'=>$address,
                'vat_number'=>$vatNumber,
                'resturant_image'=>$resturantImage 
            ]);
        }
    }
}
