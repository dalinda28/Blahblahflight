<?php

use App\Http\Controllers\AirportsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, "mainpage"])->name('main');
Route::get('/singleflight/{id}', [MainController::class, "singleflight"])->name('singleflight');
Route::get('book/singleflight/{id}', [MainController::class, "bookflight"])->middleware(['auth'])->name('bookflight');
Route::post('bookFlight/{flightId}&{passengerId}', [MainController::class, "confirmBooking"])->middleware(['auth'])->name('confirmBooking');

Route::get('/books', [BooksController::class, 'list'])->middleware(['auth'])->name('list');

Route::get('/contact', [ContactController::class, 'contactform'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendcontactform'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/termsofuse', function () {
    return view('termsofuse');
})->name('termsofuse');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/admin', [HomeController::class, 'redirect'])->middleware('admin')->name('admin.home');

Route::get('/admin/user',
    [UsersController::class, 'index'])->middleware('admin')->name('admin.user');

Route::get('/admin/airport',
    [AirportsController::class, 'index'])->middleware('admin')->name('admin.airport');

Route::get('/admin/book',
    [BooksController::class, 'index'])->middleware('admin')->name('admin.book');

Route::get('/admin/flight',
    [FlightController::class, 'index'])->middleware('admin')->name('admin.flight');

Route::get('/admin/message',
    [ContactController::class, 'index'])->middleware('admin')->name('admin.message');


//Users
Route::post('/admin/createUser',
    [UsersController::class, 'createUser']
)->middleware(['admin'])->name('admin.createUser');

Route::get('/admin/createUser',
    [UsersController::class, 'create']
)->middleware(['admin'])->name('admin.createUser');

Route::get('/admin/updateUser/{id}',
    [UsersController::class, 'updateUser']
)->middleware(['admin'])->name('admin.updateUser');

Route::post('/admin/updateUser/{id}',
    [UsersController::class, 'saveUser']
)->middleware(['admin'])->name('admin.saveUser');

Route::get('/admin/deleteUser/{id}',
    [UsersController::class, 'deleteUser']
)->middleware(['admin'])->name('admin.deleteUser');

//Airports
Route::get('/admin/createAirport',
    [AirportsController::class, 'create']
)->middleware(['admin'])->name('admin.createAirport');

Route::post('/admin/createAirport',
    [AirportsController::class, 'createAirport']
)->middleware(['admin'])->name('admin.createAirport');

Route::get('/admin/deleteAirport/{id}',
    [AirportsController::class, 'deleteAirport']
)->middleware(['admin'])->name('admin.deleteAirport');

//Flights
Route::get('/admin/createFlight',
    [FlightController::class, 'create']
)->middleware(['admin'])->name('admin.createFlight');

Route::post('/admin/createFlight',
    [FlightController::class, 'createFlight']
)->middleware(['admin'])->name('admin.createFlight');

Route::get('/admin/deleteFlight/{id}',
    [FlightController::class, 'deleteFlight']
)->middleware(['admin'])->name('admin.deleteFlight');

Route::get('/admin/updateFlight/{id}',
    [FlightController::class, 'updateFlight']
)->middleware(['admin'])->name('admin.updateFlight');

Route::post('/admin/updateFlight/{id}',
    [FlightController::class, 'saveFlight']
)->middleware(['admin'])->name('admin.saveFlight');

//Books
Route::get('/admin/deleteBook/{id}',
    [BooksController::class, 'deleteBook']
)->middleware(['admin'])->name('admin.deleteBook');

Route::get('/admin/updateBook/{id}',
    [BooksController::class, 'updateBook']
)->middleware(['admin'])->name('admin.updateBook');

Route::post('/admin/updateBook/{id}',
    [BooksController::class, 'saveBook']
)->middleware(['admin'])->name('admin.saveBook');

/* Routes relative to flight management in front */
Route::get('/flight/list', [FlightController::class, 'list'])->middleware(['verified'])->name('flight.list');
Route::get('/flight/new', [FlightController::class, 'new'])->middleware(['verified'])->name('flight.new');
Route::post('/flight/store', [FlightController::class, 'store'])->middleware(['verified'])->name('flight.store');


require __DIR__ . '/auth.php';
