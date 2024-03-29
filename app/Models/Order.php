<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    // Relationships

    public function dishes() {

        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }

    // // grazie ad accessor e usango get...Attribute 
    // // riesco a calcolarmi in modo dinamico il prezzo totale
    // public function getTotalPriceAttribute(): float
    // {   
    //     // inizializzo a 0
    //     $totalPrice = 0;

    //     // itero su dishes 
    //     foreach ($this->dishes as $dish) {
        
    //         // moltiplico i piatti per il numero degli ordini
    //         $totalPrice += $dish->price * $dish->pivot->quantity;
    //     }

    //     // return $totalPrice;
    //     dd($totalPrice);

    //     return $totalPrice;
    // }
}
