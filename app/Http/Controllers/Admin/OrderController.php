<?php

namespace App\Http\Controllers\Admin;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // filtro gli ordini in base all'utente loggato
        $orders = Order::whereHas('dishes', function ($query) {

            // scope molto particolari
            $user = auth()->user();

            $query->where('user_id', $user->id);
        })->orderBy('date')->get();

        return view('admin.orders.index', compact('orders','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $user = auth()->user();

        // Verifica se l'ordine appartiene all'utente corrente
        if ($order->dishes()->where('user_id', $user->id)->exists()) {
            return view('admin.orders.show', compact('order','user'));
        } else {
            // Se l'ordine non appartiene all'utente, reindirizza o restituisci un messaggio di errore
            // Ad esempio:
            return redirect()->route('admin.orders.index')->with('error', 'Non sei autorizzato a visualizzare questo ordine.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
