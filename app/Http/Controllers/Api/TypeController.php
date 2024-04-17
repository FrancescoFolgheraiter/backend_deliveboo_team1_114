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
        if (empty($request->all())) {
            $users = User::all();

            foreach ($users as $user) {
                $user->load('types');
            }
            
            return response()->json([
                'code' => 200,
                'message' => 'ok',
                'data' => [
                    'users' => $users
                ]
            ]);
        }
        else{
            $types = $request->input('types');
    
            //filtro gli utenti per il tipo 
            $users = User::whereHas('types', function ($query) use ($types) {
                $query->whereIn('name', $types);
            },'=',count($types))->get();
            //seconda parte di query che mi permette di caricare 
            //ogni type di un utente
            foreach ($users as $user) {
                $user->load('types');
            }
    
            return response()->json([
                'code' => 200,
                'message' => 'ok',
                'data' => [
                    'users' => $users
                ]
            ]);
        }
    }
}
