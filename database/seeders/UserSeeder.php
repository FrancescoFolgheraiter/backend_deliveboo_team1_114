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


        // mi recupero i dati da userData.php tramite config
        $resturants = config('usersData');

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
