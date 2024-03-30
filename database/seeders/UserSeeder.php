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
        $resturants = [
            [
                'name' => 'Galloway', // Fast Food 1
                'image' => 'img/user/galloway.jpg',
            ],
            [
                'name' => 'BurgerKong', // Americano 2
                'image' => 'img/user/burgerkong.jpg',
            ],
            [
                'name' => 'MucDonalds', // Americano 3
                'image' => 'img/user/mucdonalds.jpg',
            ],
            [
                'name' => 'Da Albert', // Pizzeria 4
                'image' => 'img/user/da_albert.jpg',
            ],
            [
                'name' => 'Korallo', // Pesce 5
                'image' => 'img/user/korallo.jpg',
            ],
            [
                'name' => 'RoadMouse', // BBQ 6
                'image' => 'img/user/roadmouse.jpg',
            ],
            [
                'name' => 'StefanoPizza', // Pizzeria 7
                'image' => 'img/user/stefanopizza.jpg',
            ],
            [
                'name' => 'Cinatown', // Cinese 8
                'image' => 'img/user/cinatown.jpg',
            ],
            [
                'name' => 'Da Mario', // Pizzeria 9
                'image' => 'img/user/da_mario.jpg',
            ],
            [
                'name' => 'Fork', // Etnica 10
                'image' => 'img/user/fork.jpg',
            ],
            [
                'name' => 'Mindujo', // Iberica 11
                'image' => 'img/user/burger_bistro.jpg',
            ],
            [
                'name' => 'Burger Bistro', // Americano 12
                'image' => 'img/user/burger_bistro.jpg',
            ],
            [
                'name' => 'Pizzeria Deliziosa', // Pizzeria 13
                'image' => 'img/user/pizzeria_deliziosa.jpg',
            ],
            [
                'name' => 'Slice & Grill', // BBQ 14
                'image' => 'img/user/slice&grill.jpg',
            ],
            [
                'name' => 'Crispy Crust Cafe', // Messicano 15
                'image' => 'img/user/crispy.jpg',
            ],
            [
                'name' => 'Pizzamania', // Pizzeria 16
                'image' => 'img/user/pizzamania.jpg',
            ],
            [
                'name' => 'Burger Barbecue', // Americano 17
                'image' => 'img/user/burgerBarbecue.jpg',
            ],
            [
                'name' => 'Sushi Sinfonia', // Sushi 18
                'image' => 'img/user/sushisinfonia.jpg',
            ],
            [
                'name' => 'La Bella Italia', // Paninoteca 19
                'image' => 'img/user/bellaItalia.jpg',
            ],
            [
                'name' => 'Sushi Palace', // Sushi 20
                'image' => 'img/user/sushipalace.jpg',
            ]
        ];
        //popolazione table  user
        foreach ($resturants as $resturant) {
            $resturant_name = $resturant['name'];

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

            $resturant_image = $resturant['image'];

            $user = user::create([
                'resturant_name'=> $resturant_name,
                'email'=> $email,
                'password'=> $password,
                'address'=> $address[0],
                'vat_number'=> $vatNumber,
                'resturant_image'=> $resturant_image 
            ]);
        }
    }
}
