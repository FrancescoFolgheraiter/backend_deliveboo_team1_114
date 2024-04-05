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

    public function statistic()
    {
        $user = auth()->user();
        

        // filtro gli ordini in base all'utente loggato
        $orders = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(total_price) as total_price')
        ->whereHas('dishes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->orderBy('year')
        ->orderBy('month')
        ->groupBy('year', 'month')
        ->get();

        $totalPrice = [];
        
        foreach ($orders as $order) {
            $totalPrice[] = $order->total_price;
            $labels[] =  str_pad($order->month, 2, '0', STR_PAD_LEFT). '-' .$order->year ;
        }

        $sales = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Andamento vendite",
                'backgroundColor' => "rgba(241, 100, 71, 0.31)",
                'borderColor' => "rgba(241, 100, 71, 1)",
                "pointBorderColor" => "rgba(241, 100, 71, 0.7)",
                "pointBackgroundColor" => "rgba(241, 100, 71, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                "data" => $totalPrice,
                "fill" => false,
            ]
        ])
        ->options([
        ]);

        return view('admin.orders.statistic', compact('sales','user'));
    }
}
