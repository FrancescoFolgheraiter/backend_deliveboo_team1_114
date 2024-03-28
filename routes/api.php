<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//importazione controller API Project
use App\Http\Controllers\Api\DishController as ApiDishController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function() {
    
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    //Rotta per Index e show delle mie api DishColtroller che permettono di far visualizzare i cibi
    Route::resource('projects', ApiDishController::class)->only([
        'index',
        'show'
    ]);
});