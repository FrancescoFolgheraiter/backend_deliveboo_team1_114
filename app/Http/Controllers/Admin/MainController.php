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
    //funzione di salvataggio nel db che permette di salvare e modificare
    //la relazione tra user e types
    public function typesUpdate(request $request){
        //tramite la facede auth prelevo i dati dell'utente loggato
        $user = auth()->user();
        //controllo se i dati arrivati dalla view
        //non sono stait compromessi
        $request->validate([
            'types'=>'nullable|array|exists:types,id',
        ]);
        //controllo se sono presenti types
        if ($request->has('types')) {
            //faccio la sincronizzazione delle relazioni
            $user->types()->sync($request->types);
        } else {
            //nel caso non siano presenti types cancello le relazioni
            //precedentemente rigistrate
            $user->types()->detach();
        }
        
        return redirect()->route('admin.dashboard');
    }

}
