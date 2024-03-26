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
        
        
        //popolazione della tabella
        $users = User::all();
        foreach ($users as $user) {
            $types = type::inRandomOrder()->limit(rand(1, 3))->get();
            foreach ($types as $type) {
                $user->tags()->attach($type->id);
            }
        }
    }
}
