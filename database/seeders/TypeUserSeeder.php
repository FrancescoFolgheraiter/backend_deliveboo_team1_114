<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;
use App\Models\Type;

// Helpers 
use Illuminate\Support\Facades\Schema;
class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resturants = config('usersData');
        
        //popolazione della tabella
        $users = User::all();
        //ciclo su tutti gli utenti
        foreach ($users as $key => $user) {
            //prelevo da 1 a 3 tipologie random
            $types = Type::whereIn('name', $resturants[$key]['types'])->get();
            //leggo i tipi prelevati e li utilizzo la relazione per aggiungerli al db
            foreach ($types as $type) {
                $user->types()->attach($type->id);
            }
        }
    }
}
