<?php

namespace App\Http\Controllers\Admin;

//importazione controller
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Dish;

//Form request
use App\Http\Requests\Dish\StoreRequest as StoreDishRequest;
use App\Http\Requests\Dish\UpdateRequest as UpdateDishRequest;

//Helpers
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $user = auth()->user();
        return view('admin.dishes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $dishData = $request->validated();
        
        //trasformo gli ingredienti presi in input in arrya per preservare la struttura dati
        //successivamente li trasformo nuovamente in stringa grazie ad encode
        //gestione inserimento immagini
        $imgPath = null;
        //se l'immagine è stata aggiunta la aggiungo allo storage/img/dishes
        if (isset($dishData['image'])) {
            $imgPath = Storage::disk('public')->put('img/dishes', $dishData['image']);
        }
        //una volta aggiunta l'immagine alla cartella storage sostituisco il valore $dishData['image'] con il percorso
        $dishData['image'] = $imgPath;
        //fine gestione immagini

        //recupero l'id dell'utente per poi poter creare la relazione col piatot
        $userID = auth()->user()->id;
        $dishData['user_id'] = $userID;
        $dish = Dish::create($dishData);
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        $user = auth()->user();
        //proteggo la rotta che può essere visualizzata solo dal utente loggato per i suoi piatti
        //e proteggo la rotta nel caso sia valorizzata la colonna delete per 
        //evitare forzature di url
        if($user->id == $dish->user_id && $dish->delete == null ){
            return view('admin.dishes.show', compact('dish', 'user'));
        }
        else{
            return redirect()->route('admin.dishes.index')->with('error', 'Non sei autorizzato a visualizzare questo piatto.');
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $user = auth()->user();
        //proteggo la rotta che può essere visualizzata solo dal utente loggato per i suoi piatti
        //e proteggo la rotta nel caso sia valorizzata la colonna delete per 
        //evitare forzature di url
        if($user->id == $dish->user_id && $dish->delete == null ){
            return view('admin.dishes.edit', compact('dish', 'user'));
        }
        else{
            return redirect()->route('admin.dishes.index')->with('error', 'Non sei autorizzato a visualizzare questo piatto');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $validDishes = $request->validated();
        
        $ImagePath = $dish->image;
        if (isset($validDishes['image'])){
            if ($dish->image != null){
                Storage::disk('public')->delete($dish->image);
            }

            $ImagePath = Storage::disk('public')->put('img/dishes', $validDishes['image']);
        }
        else if (isset($validDishes['delete_image'])){
            Storage::disk('public')->delete($dish->image);

            $ImagePath = null;
        }

        $validDishes['image'] = $ImagePath;

        $dish->update([
            'name' => $validDishes['name'],
            'description' => $validDishes['description'],
            'ingredients' => $validDishes['ingredients'],
            'price' => $validDishes['price'],
            'visible' => $validDishes['visible'],
            'image' => $validDishes['image']
        ]);

        return redirect()->route('admin.dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        //controllo se è presente un immagine del piatto e in caso la elimino da storage
        if ($dish->image != null) {
            Storage::disk('public')->delete($dish->image);
        }
        //cancello il piatto
        //invece di  fare un hard delete $dish->delete();
        //faccio un soft valorizzando la colonna delete con la data di cancellazione
        $dish->update([
            'delete' => Carbon::now()->format('Y-m-d')
        ]);

        //reindirizzo sull'index dei piatti
        return redirect()->route('admin.dishes.index');
    }
}
