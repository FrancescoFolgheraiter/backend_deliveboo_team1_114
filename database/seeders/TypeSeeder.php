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
            'Pizzeria',
            'Italiano',
            'Paninoteca',
            'Enoteca',
            'Gelateria',
            'Iberica',
            'Friggitoria',
            'Sushi',
            'Etnica',
            'Orientale',
            'Cinese',
            'Americano',
            'BBQ',
            'Fast food',
        ];
        //eseguo un foreach per popolare type->name descrizione la lascio a null
        foreach ($types as $elem) {
            $type = type::create([
                'name'=>$elem,
            ]);
        }
       
    }
}
