<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Order;

//Form request
use App\Http\Requests\Order\StoreRequest as StoreOrderRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $orderData = $request->validated();

        $order = Order::create($orderData);
        //invio al frontend di un messaggio di avvenuto
        //storaggio dei dati con successo
        return response()->json(['message' => 'Ordine creato con successo', 'order' => $order], 201);
    }

}
