<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\StatisticContoller as AdminStatisticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
    //rotta per la dashboard con visibilità dei dati utente
    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/users', [AdminMainController::class, 'editUser'])->name('dashboard.editUser');
    Route::put('/dashboard/users/', [AdminMainController::class, 'usersUpdate'])->name('dashboard.users.update');
    //rotte per CRUD di dishes
    Route::resource('dishes', AdminDishController::class);
    Route::resource('orders', AdminOrderController::class)->only([
        'index',
        'show',
        'update'
    ]);
    //rotta per la pagina di statistiche del corrente anno
    Route::get('statistics/salesCurrentYear', [AdminStatisticController::class, 'salesCurrentYear'])->name('statistics.salesCurrentYear');
    //rotta per la pagina di statistiche totali
    Route::get('statistics/totalSales', [AdminStatisticController::class, 'totalSales'])->name('statistics.totalSales');
    //rotta per le statistiche dei piatti venduti
    Route::get('statistics/dishesSales', [AdminStatisticController::class, 'dishesSales'])->name('statistics.dishesSales');
});

require __DIR__.'/auth.php';
