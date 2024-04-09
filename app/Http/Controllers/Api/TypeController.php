<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models 
use App\Models\Type;
use App\Models\User;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'code' => 200,
            'message' => 'ok',
            'data' => [
                'types' => $types
            ]
        ]);
    }
    public function show(request $request){
        //prendo in input i tipi da filtrare tramite i parametri della 
        //richiesta API
        $types = $request->input('types');
        //filtro gli utenti per il tipo 
        $users = User::whereHas('types', function ($query) use ($types) {
            $query->whereIn('name', $types);
        },'=',count($types))->get();

        return response()->json([
            'code' => 200,
            'message' => 'ok',
            'data' => [
                'types' => $users
            ]
        ]);
    }
}
