<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models 
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with(['users' => function ($query) {
            $query->select('id', 'resturant_name', 'address', 'email');
        }])->paginate(10);

        return response()->json([
            'code' => 200,
            'message' => 'ok',
            'data' => [
                'types' => $types
            ]
        ]);
    }
}
