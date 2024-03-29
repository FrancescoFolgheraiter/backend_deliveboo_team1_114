<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\type;
use App\Models\User;
class MainController extends Controller
{
    //funzione che permette di visualizzare i dati dell'utente le categhorie ad esso collegate
    public function dashboard()
    {
        $user = auth()->user();
        $types = Type::all();
        return view('admin.dashboard', compact('user','types'));
    }
    //funzione di reindirizzamento sull'edit di user esclusivo per type
    public function types(){
        $user = auth()->user();
        $types = Type::all();
        return view('admin.editTypes', compact('user','types'));
    }
    //funzione di salvataggio nel db
    public function typesUpdate(request $request, User $user){
        $request->validate([
            'types'=>'nullable|array|exists:types,id',
        ]);
        if ($request->has('types')) {
            $user->types()->sync($request->types);
        }
        else {
            $user->types()->detach();
        }

        return view('admin.types.index', compact('user','types'));
    }

}
