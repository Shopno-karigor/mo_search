<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/', [IndexController::class, 'index_index'])->name('/');
    //Booking
    Route::get('booking-query', [BookingController::class, 'index'])->name('booking-query');
    Route::post('submit-booking-query', [BookingController::class, 'create'])->name('submit-booking-query');
    Route::post('confirm-query', [BookingController::class, 'confirm_by_user'])->name('confirm-query');
    Route::post('cancel-from-query', [BookingController::class, 'cancel_by_user'])->name('cancel-from-query');
    Route::post('approve-booking-query', [BookingController::class, 'approve'])->name('approve-booking-query');
    Route::post('cancel-booking-query', [BookingController::class, 'cancel'])->name('cancel-booking-query');
    Route::get('booking-query-details/{id}', [BookingController::class, 'edit'])->name('booking-query-details');
});
