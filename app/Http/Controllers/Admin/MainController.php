<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\type;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;

// Helpers
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
class MainController extends Controller
{
    //funzione che permette di visualizzare i dati dell'utente le categhorie ad esso collegate
    public function dashboard()
    {
        $user = auth()->user();
        $types = Type::all();
        $dishes = $user->dishes;

        // Ottieni la data odierna
        $currentDate = now();

        // Filtra gli ordini in base all'utente loggato e alla data odierna
        $orders = Order::whereHas('dishes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->whereDate('date', $currentDate) // Filtra per la data odierna
        ->orderByDesc('date') // Ordina per data decrescente
        ->get();

        return view('admin.dashboard', compact('user','types','orders'));
        
    }
    //funzione di reindirizzamento sull'edit di user esclusivo per type
    public function editUser(){
        $user = auth()->user();
        $types = Type::all();
        return view('admin.users.edit', compact('user','types'));
    }
    //funzione di salvataggio nel db che permette di salvare e modificare
    //la relazione tra user e types
    public function usersUpdate(request $request){

        //tramite la facede auth prelevo i dati dell'utente loggato
        $user = auth()->user();
        //controllo se i dati arrivati dalla view
        //non sono stait compromessi
        $request->validate([
            'types'=>'nullable|array|exists:types,id',
            'resturant-image'=>'image|max:2048',
        ]);
        //gestione immagine
        $imgPath = $user->resturant_image;

        if (isset($request['resturant-image'])) {
            //entro in questa condizione se l'utente ha valorizzato con un file immagine
            //cancello l'immagine vecchhia nello storage
            Storage::disk('public')->delete($user->resturant_image);
            //aggiungo l'immmagine all'interno dello storage nella cartella images
            $imgPath = Storage::disk('public')->put('img/user', $request['resturant-image']);
        }
        //fine gestione modifica dell'immagine

        $user->update([
            'resturant_image'=>$imgPath
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
