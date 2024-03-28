<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'ingredients',
        'price',
        'visible',
        'image',
        'delete_image'
    ];

    /*
        Relationships
    */

    // Many-to-Many con Order
    public function orders() 
    {
        return $this->belongsToMany(Order::class);
    }

    // One-to-Many con User
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
