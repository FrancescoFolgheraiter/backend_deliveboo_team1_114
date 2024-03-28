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
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $dishData = $request->validated();
        
        //trasformo gli ingredienti presi in input in arrya per preservare la struttura dati
        //successivamente li trasformo nuovamente in stringa grazie ad encode
        //per poterli inserire nel db
        $dishData['ingredients'] = json_encode(explode(" ",$dishData['ingredients']));
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
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
