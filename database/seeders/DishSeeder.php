<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::truncate();

        for ($i = 0; $i < 30, $i++){
            $dish = new Dish();

            $dish->name = 
            $dish->description = 
            $dish->ingredients
            $dish->price 
            $dish->visible
            $dish->image 
            $dish->save();
        }
    }
}
