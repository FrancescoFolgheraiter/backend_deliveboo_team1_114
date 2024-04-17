<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Dish;
use App\Models\User;

// Helpers 
use Illuminate\Support\Facades\Schema;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // disabilito i vincoli con le foreign keys
        Schema::disableForeignKeyConstraints();

        // cancello tutti i dati presenti nella table
        Dish::truncate();

        // riabilito i vincoli con le foreign keys
        Schema::enableForeignKeyConstraints();

        // mi recupero i dati da dishes.php tramite config
        $dishesData = config('dishes');
        
        foreach ($dishesData as $dish) {

            // creo un nuovo dish
            $newDish = new Dish();

            // genero dei dati fake tramier faker e assegno gli elementi presenti nell'array
            // ricordarsi di pushare l'elemento utilizzando il json_decode
            $newDish->name = $dish['nome'];
            $newDish->description = $dish['descrizione'];
            $newDish->ingredients = $dish['ingredienti'];
            $newDish->price = $dish['prezzo'];
            $newDish->visible = 1;
            $newDish->user_id = $dish['ristorante'];
            $newDish->image = $dish['immagine'];
            $newDish->save();
        }
    }
}
