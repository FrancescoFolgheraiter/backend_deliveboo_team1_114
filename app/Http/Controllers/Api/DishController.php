<?php

namespace App\Http\Controllers\Api;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Dish;
use App\Models\User;

class DishController extends Controller
{
    //index piatti api
    public function index(request $request)
    {
        //Verifico che la richiesta effettuata tramite api abbia
        //come parametro name
        if (!$request->has('name')) {
            return response()->json([
                'code' => 400,
                'message' => 'Il parametro "name" è obbligatorio',
            ], 400);
        }
        //prendo l'utente che mi è stato richiesto dal db
        $restaurantId = User::where('name_restaurant', $request->input('name'))->value('id');
        //Verifico che la ricerca del ristorante sia andata a buon fine
        if (!$restaurantId) {
            return response()->json([
                'code' => 404,
                'message' => 'Nessun ristorante trovato con il nome specificato',
            ], 404);
        }
        //prendo i piatti di quell'utente
        $dishes = Dish::where('user_id', $restaurantId)->get();

        //tramite questa funzione ritorno il file json con al struttura delineata nelle []
        return response()->json([
            'code'=> 200,
            'message'=>'ok',
            'data'=> [
                'foods'=> $dishes
            ]
        ]);
    }

    //Show api per vedere il piatto

    public function show(Dish $dish)
    {
        $dish = dish::with(['user' => function ($query) {
            $query->select('id', 'resturant_name', 'address', 'vat_number');
        }])->where('id', $dish->id)->firstOrFail();

        return response()->json([
            'code'=> 200,
            'message'=>'ok',
            'data'=> [
                'dish'=> $dish
            ]
        ]);
    }
}
