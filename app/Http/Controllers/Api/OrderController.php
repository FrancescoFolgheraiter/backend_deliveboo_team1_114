<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Order;

//Form request
use App\Http\Requests\Api\StoreOrderRequest;

//Helpers
use Carbon\Carbon;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $validatedData = $request->validated();
        $currentDate = Carbon::now();
        
        //salvo i dati dell'ordine
        $order = Order::create([
            'name' =>$validatedData['params']['name'],
            'surname' =>$validatedData['params']['surname'],
            'date' => $currentDate,
            'total_price'=>$validatedData['params']['total_price'],
            'note'=>$validatedData['params']['note'],
            'address' =>$validatedData['params']['address'],
            'phone_number' =>$validatedData['params']['phone_number'],
        ]);
        //una volta creato l'ordine posso fare l'attach 
        //nella pivot Orders->dishes
        foreach ($validatedData['params']['order'] as $item) {
            $order->dishes()->attach($item[0], ['quantity' => $item[1]]);
        }
        //invio al frontend di un messaggio di avvenuto
        //storaggio dei dati con successo
        return response()->json(['message' => 'Ordine creato con successo', 'order' => $order], 201);
    }

}
