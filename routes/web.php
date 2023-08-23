<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OperatorController;

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

Route::get('/', [IndexController::class, 'index_welcome'])->name('/');
Route::get('search', [IndexController::class, 'index_search'])->name('search');
Route::post('submit-search-query', [IndexController::class, 'search'])->name('submit-search-query');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('admin', [IndexController::class, 'index_index'])->name('admin');
    Route::get('country-list', [CountryController::class, 'show'])->name('country-list');
    Route::get('add-operator', [OperatorController::class, 'index'])->name('add-operator');
    Route::post('store-operator', [OperatorController::class, 'store'])->name('store-operator');
    Route::get('operator-list', [OperatorController::class, 'show'])->name('operator-list');
    Route::get('edit-operator/{id}', [OperatorController::class, 'edit'])->name('edit-operator');
    Route::post('update-operator', [OperatorController::class, 'update'])->name('update-operator');
    Route::post('destroy-operator', [OperatorController::class, 'destroy'])->name('destroy-operator');
});
