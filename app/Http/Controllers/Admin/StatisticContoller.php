<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Order;
use App\Models\Dish;
use App\Models\User;

//Helpers
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class StatisticContoller extends Controller
{
    public function salesCurrentYear()
    {
        $user = auth()->user();
        
        //prelevo l'anno corrente tramite carbon
        $currentYear = Carbon::now()->year;
        // filtro gli ordini in base all'utente loggato con whereHas
        // selectrow permette di creare una struttura dati con YEAR(preso dalla data), MOTH (preso dalla data)
        //SUM con il totale della somma delle vendite mentre orderBy lo ordino per mesi
        //e raggruppo per anno e mese
        $orders = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(total_price) as total_price')
        ->whereHas('dishes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->whereYear('date', $currentYear)
        ->orderBy('month')
        ->groupBy('year', 'month')
        ->get();

        //controllo se ho dei dati con cui poter far vedere i grafici nel caso non li abbia blocco la funzione
        if ($orders->isEmpty()) {
            // Se non ci sono ordini, restituisci solo la vista senza il grafico
            $user = auth()->user();
            return view('admin.statistics.index', compact('user'));
        }

        $totalPrice = [];
        //il foreach mi permette di estrapolare i mesi e il totale dei prezzi
        //per successivamente utilizzarli con chartjs        
        foreach ($orders as $order) {
            $totalPrice[] = $order->total_price;
            $labels[] =  str_pad($order->month, 2, '0', STR_PAD_LEFT). '-' .$order->year ;
        }

        $chart = app()->chartjs
        ->name('salesCurrentYear')
        ->type('line')
        ->size(['width' => 900, 'height' => 600])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Andamento vendite anno corrente",
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
            'scales' => [
                'y' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Totale vendite'
                    ],
                ]
            ]
        ]);

        return view('admin.statistics.index', compact('chart','user'));
    }

    public function totalSales()
    {
        $user = auth()->user();
        
        //prelevo l'anno corrente tramite carbon
        $currentYear = Carbon::now()->year;
        // query che mi permette di prelevare e filtrare gli stessi dati
        //della query precedente solo che prendiamo in considerazione tutti gli anni
        //aggregando i dati per totale vendite mese
        $orders = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(total_price) as total_price')
        ->whereHas('dishes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->orderBy('year')
        ->orderBy('month')
        ->groupBy('year', 'month')
        ->get();

        //controllo se ho dei dati con cui poter far vedere i grafici nel caso non li abbia blocco la funzione
        if ($orders->isEmpty()) {
            // Se non ci sono ordini, restituisci solo la vista senza il grafico
            $user = auth()->user();
            return view('admin.statistics.index', compact('user'));
        }

        $totalPrice = [];
        //il foreach mi permette di estrapolare i mesi e il totale dei prezzi
        //per successivamente utilizzarli con chartjs        
        foreach ($orders as $order) {
            $totalPrice[] = $order->total_price;
            $labels[] =  str_pad($order->month, 2, '0', STR_PAD_LEFT). '-' .$order->year ;
        }

        $chart = app()->chartjs
        ->name('totalSales')
        ->type('line')
        ->size(['width' => 900, 'height' => 600])
        ->labels($labels)
        ->datasets([
            [
                "label" => "Storico vendite",
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
            'scales' => [
                'y' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Totale vendite'
                    ],
                ]
            ]
        ]);

        return view('admin.statistics.index', compact('chart','user'));
    }

    public function dishesSales()
    {
        $userId = auth()->user()->id;
        //query che mi permette di recupare la somma dei totale dei piatti venduti
        //e raggrupparla per il nome dei piatti
        $totalDishes = DB::table('users')
            ->join('dishes', 'dishes.user_id', '=', 'users.id')
            ->join('dish_order', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->select(DB::raw('SUM(dish_order.quantity) AS total_quantity'), 'dishes.name')
            ->where('users.id', $userId)
            ->groupBy('dishes.name')
            ->get();

        
        //controllo se ho dei dati con cui poter far vedere i grafici nel caso non li abbia blocco la funzione
        if ($totalDishes->isEmpty()) {
            // Se non ci sono ordini, restituisci solo la vista senza il grafico
            $user = auth()->user();
            return view('admin.statistics.index', compact('user'));
        }

        //manipolazione dati
        $nameDishes=[];
        $dataDishes=[];
        //con il seguente ciclo separio i nomi dei piatti
        //dal loro valore totale di vendita    
        foreach ($totalDishes as $key => $totalDish) {
            $nameDishes[]=$totalDish->name;
            $dataDishes[]=$totalDish->total_quantity;  
        }
        $colorPalette = ['#36A2EB', '#FF6384', '#FFCE56', '#8A2BE2', '#00FF00', '#FF4500', '#0000FF', '#A52A2A', '#7FFF00', '#FFD700'];

        // Verifica la lunghezza di dataDishes
        $dataLength = count($dataDishes);
        
        // Prendi un sottinsieme dei colori dal palette in base alla lunghezza di dataDishes
        $backgroundColors = array_slice($colorPalette, 0, $dataLength);

        $chart = app()->chartjs
        ->name('totalSales')
        ->type('doughnut')
        ->size(['width' => 700, 'height' => 350])
        ->labels($nameDishes)
        ->datasets([
            [
                "label" => "Totale piatti venduti",
                "data" => $dataDishes,
                'backgroundColor' => $colorPalette,
                "fill" => true,
            ]
        ])
        ->options([
        ]);
        $user = auth()->user();
        return view('admin.statistics.index', compact('chart','user'));
    }
}
