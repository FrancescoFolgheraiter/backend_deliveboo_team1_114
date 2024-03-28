<?php

namespace App\Http\Controllers\Api;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Dish;

class DishController extends Controller
{
    //index piatti api
    public function index()
    {
        //paginate mi permette di suddivide i dati in pagine, gli argomenti nel with() permettono l'Eager Loading
        $foods = Dish::with('user')->paginate(12);
        //tramite questa funzione ritorno il file json con al struttura delineata nelle []
        return response()->json([
            'code'=> 200,
            'message'=>'ok',
            'data'=> [
                'foods'=> $foods
            ]
        ]);
    }

    //Show api per vedere il piatto

    public function show(Dish $dish)
    {
        $dish = dish::with('user')->firstOrFail();

        return response()->json([
            'code'=> 200,
            'message'=>'ok',
            'data'=> [
                'dish'=> $dish
            ]
        ]);
    }
}
