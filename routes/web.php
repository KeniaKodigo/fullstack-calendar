<?php

use App\Http\Controllers\AccomodationsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/accomodations', function () {
//     return view('pages.accomodations');
// });

Route::get('/accomodations', [AccomodationsController::class, 'index'])->name('listAccomodations');

Route::get('/bookings', [BookingsController::class, 'get_bookings_by_accomodations'])->name('bookingsAccomodation');

Route::post('/save_accomodation', [AccomodationsController::class, 'save'])->name('saveAccomodation');

Route::get('/form_booking', [BookingsController::class, 'form_register']);

Route::post('/save_booking', [BookingsController::class, 'save'])->name('saveBooking');

Route::put('/update_status/{id}', [BookingsController::class, 'updateStatus'])->name('statusBooking');

//Calendario
Route::get('/calendario', [CalendarController::class, 'index']);

//Reporte
Route::get('/reporte', [PDFController::class, 'index']);