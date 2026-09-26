<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes - Lety Hair by Byliah
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::get('/budget', [BudgetController::class, 'index'])->name('budgets.index');
Route::post('/budget', [BudgetController::class, 'store'])->name('budgets.store');
Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');