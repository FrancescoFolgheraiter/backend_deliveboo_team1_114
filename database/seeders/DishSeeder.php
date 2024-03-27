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

        // definisco un array con elementi in italiano
        $dishes = [
            [
                'nome' => 'Pizza Margherita',
                'immagine' => 'pizza_margherita.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'basilico', 
                    'olio d\'oliva'
                ]
            ],
            [
                'nome' => 'Pizza Pepperoni',
                'immagine' => 'pizza_pepperoni.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'peperoni', 
                    'origano'
                ]
            ],
            [
                'nome' => 'Pizza Quattro Stagioni',
                'immagine' => 'pizza_quattro_stagioni.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'funghi', 
                    'carciofi', 
                    'olive'
                ]
            ],
            [
                'nome' => 'Pizza Prosciutto e Funghi',
                'immagine' => 'pizza_prosciutto_funghi.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'prosciutto', 
                    'funghi', 
                    'origano'
                ]
            ],
            [
                'nome' => 'Pizza Capricciosa',
                'immagine' => 'pizza_capricciosa.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'funghi', 
                    'prosciutto', 
                    'carciofi', 
                    'olive'
                ]
            ],
            [
                'nome' => 'Pizza Quattro Formaggi',
                'immagine' => 'pizza_quattro_formaggi.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'gorgonzola', 
                    'fontina', 
                    'parmigiano', 
                    'pomodoro'
                ]
            ],
            [
                'nome' => 'Pizza Frutti di Mare',
                'immagine' => 'pizza_frutti_di_mare.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'frutti di mare', 
                    'aglio', 
                    'prezzemolo'
                ]
            ],
            [
                'nome' => 'Pizza Vegetariana',
                'immagine' => 'pizza_vegetariana.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'zucchine', 
                    'peperoni', 
                    'melanzane', 
                    'funghi'
                ]
            ],
            [
                'nome' => 'Pizza Bufalina',
                'immagine' => 'pizza_bufalina.jpg',
                'ingredienti' => [
                    'mozzarella di bufala', 
                    'pomodoro', 
                    'basilico', 
                    'olio d\'oliva'
                ]
            ],
            [
                'nome' => 'Pizza Diavola',
                'immagine' => 'pizza_diavola.jpg',
                'ingredienti' => [
                    'mozzarella', 
                    'pomodoro', 
                    'salsiccia piccante', 
                    'peperoncino', 
                    'origano'
                ],
            ],
            [
                'nome' => 'Cheeseburger',
                'immagine' => 'cheeseburger.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'lattuga', 
                    'pomodoro', 
                    'cipolla'
                ],
            ],
            [
                'nome' => 'Hamburger con Bacon',
                'immagine' => 'hamburger_bacon.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'bacon', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger al Formaggio',
                'immagine' => 'hamburger_formaggio.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'salsa', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger Vegetariano',
                'immagine' => 'hamburger_vegetariano.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger di verdure', 
                    'formaggio', 
                    'lattuga', 
                    'pomodoro', 
                    'cipolla'
                ],
            ],
            [
                'nome' => 'Hamburger con Uovo',
                'immagine' => 'hamburger_uovo.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'uovo', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger con Guacamole',
                'immagine' => 'hamburger_guacamole.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'guacamole', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger con Barbecue',
                'immagine' => 'hamburger_barbecue.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'salsa barbecue', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger con Jalapeños',
                'immagine' => 'hamburger_jalapenos.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'jalapeños', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger con Funghi',
                'immagine' => 'hamburger_funghi.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'funghi', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Hamburger con Cipolla Caramellata',
                'immagine' => 'hamburger_cipolla_caramellata.jpg',
                'ingredienti' => [
                    'pane', 
                    'hamburger', 
                    'formaggio', 
                    'cipolla caramellata', 
                    'lattuga', 
                    'pomodoro'
                ],
            ],
            [
                'nome' => 'Sashimi',
                'immagine' => 'sashimi.jpg',
                'ingredienti' => [
                    'pesce crudo', 
                    'riso', 
                    'alghe', 
                    'wasabi', 
                    'zenzero'
                ],
            ],
            [
                'nome' => 'Nigiri',
                'immagine' => 'nigiri.jpg',
                'ingredienti' => [
                    'pesce crudo', 
                    'riso', 
                    'alghe', 
                    'wasabi', 
                    'zenzero'
                ],
            ],
            [
                'nome' => 'Maki',
                'immagine' => 'maki.jpg',
                'ingredienti' => [
                    'riso', 
                    'pesce', 
                    'verdure', 
                    'alga nori', 
                    'wasabi', 
                    'zenzero'
                ],
            ],
            [
                'nome' => 'Sushi California',
                'immagine' => 'sushi_california.jpg',
                'ingredienti' => [
                    'riso', 
                    'salmone', 
                    'avocado', 
                    'alga nori', 
                    'sesamo'
                ],
            ],
            [
                'nome' => 'Sushi Dragon Roll',
                'immagine' => 'Sushi Dragon Roll',
                'immagine' => 'sushi_dragon_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'gamberetti', 
                    'avocado', 
                    'alga nori', 
                    'sesamo', 
                    'salsa teriyaki'
                ],
            ],
            [
                'nome' => 'Sushi Rainbow Roll',
                'immagine' => 'sushi_rainbow_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'salmone', 
                    'tonno', 
                    'avocado', 
                    'gamberetti', 
                    'alga nori', 
                    'sesamo'
                ],
            ],
            [
                'nome' => 'Sushi Tempura Roll',
                'immagine' => 'sushi_tempura_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'gamberetti tempura', 
                    'avocado', 
                    'alga nori', 
                    'sesamo', 
                    'maionese'
                ],
            ],
            [
                'nome' => 'Sushi Philadelphia Roll',
                'immagine' => 'sushi_philadelphia_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'salmone', 
                    'formaggio cremoso', 
                    'aglio', 
                    'alga nori', 
                    'sesamo'
                ],
            ],
            [
                'nome' => 'Sushi California Roll',
                'immagine' => 'sushi_california_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'granchio', 
                    'avocado', 
                    'alga nori', 
                    'sesamo', 
                    'maionese'
                ],
            ],
            [
                'nome' => 'Sushi Spicy Tuna Roll',
                'immagine' => 'sushi_spicy_tuna_roll.jpg',
                'ingredienti' => [
                    'riso', 
                    'tonno piccante', 
                    'alga nori', 
                    'sesamo', 
                    'avocado'
                ],
            ]
        ];

        foreach ($dishes as $dish) {

            // creo un nuovo order
            $newDish = new Dish();

            // genero dei dati fake tramier faker e assegno gli elementi presenti nell'array
            // ricordarsi di pushare l'elemento utilizzando il json_decode
            $newDish->name = $dish['nome'];
            $newDish->description = fake()->sentence();
            $newDish->ingredients = json_encode($dish['ingredienti']);
            $newDish->price = fake()->randomFloat(2, 1, 100);
            $newDish->visible = fake()->boolean();
            $newDish->user_id = 1;
            $newDish->image = $dish['immagine'];
            $newDish->save();
        }
    }
}
