<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;

    /*
        Relationships
    */
    // Many-to-Many con User
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
