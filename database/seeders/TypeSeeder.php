<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Type;


// Helpers 
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //primo modo per eseguire in modo sicuro il truncate
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();
        //tipologie di locali che possiamo avere nel nostro applicativo
        $types = [
            [
                'name' => 'Pizzeria',
                'image' => 'pizzeria.jpg',
                'description' => ''
            ],
            [
                'name' => 'Pesce',
                'image' => 'pesce.jpg',
                'description' => ''
            ],
            [
                'name' => 'Paninoteca',
                'image' => 'paninoteca.jpg',
                'description' => ''
            ],
            [
                'name' => 'Iberica',
                'image' => 'iberica.jpg',
                'description' => ''
            ],
            [
                'name' => 'Meditteranea',
                'image' => 'meditteranea.jpg',
                'description' => ''
            ],
            [
                'name' => 'Sushi',
                'image' => 'sushi.jpg',
                'description' => ''
            ],
            [
                'name' => 'Etnica',
                'image' => 'etnico.jpg',
                'description' => ''
            ],
            [
                'name' => 'Cinese',
                'image' => 'cinese.jpg',
                'description' => ''
            ],
            [
                'name' => 'Americano',
                'image' => 'americano.jpg',
                'description' => ''
            ],
            [
                'name' => 'BBQ',
                'image' => 'BBQ.jpg',
                'description' => ''
            ],
            [
                'name' => 'Fast food',
                'image' => 'fastFood.jpg',
                'description' => ''
            ],
            [
                'name' => 'Messicano',
                'image' => 'messicano.jpg',
                'description' => ''
            ]
        ];
        
        //eseguo un foreach per popolare type->name descrizione la lascio a null
        foreach ($types as $elem) {
            $type = type::create([
                'name'=>$elem['name'],
                'image'=>$elem['image']
            ]);
        }
       
    }
}
