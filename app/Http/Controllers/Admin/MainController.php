<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\type;
class MainController extends Controller
{
    //funzione che permette di visualizzare i dati dell'utente le categhorie ad esso collegate
    public function dashboard()
    {
        $user = auth()->user();
        $types = Type::all();
        return view('admin.dashboard', compact('user','types'));
    }
    //
    public function types(){
        $user = auth()->user();
        $types = Type::all();
        return view('admin.editTypes', compact('user','types'));
    }
   



}
