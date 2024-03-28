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
        //
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
        return view('admin.dishes.edit', compact('dish'));
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

            $ImagePath = Storage::disk('public')->put('img', $validDishes['image']);
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
        //
    }
}
