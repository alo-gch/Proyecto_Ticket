<?php

use Illuminate\Support\Facades\Route;

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

// Route::group(['prefix' => 'admin'], function () {

// });

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::middleware('role:1')->prefix('admin')->group(function () {
        Route::get('/', function () { return view('layouts.layout'); })->name("admin.home");
        Route::resource('cajeros', 'CheckerController');
        Route::resource('cajas', 'CashReceiptController');
        Route::get("schedule" ,"ScheduleController@index")->name("schedule");
        Route::post("schedule/store" ,"ScheduleController@store")->name("schedule.store");
        Route::get("/type-ticket/index", "TypeTicketController@index")->name("typeTickets.index");
        Route::get("/type-ticket/create", "TypeTicketController@create")->name("typeTickets.create");
        Route::post("/type-ticket/store", "TypeTicketController@store")->name("typeTickets.store");

        Route::get("/type-ticket/edit/{id}", "TypeTicketController@edit")->name("typeTickets.edit");
        Route::post("/type-ticket/update/{id}", "TypeTicketController@update")->name("typeTickets.update");
        Route::get("/type-ticket/delete/{id}", "TypeTicketController@delete")->name("typeTickets.delete");


    });
    Route::middleware('role:2')->prefix('cajero')->group(function () {
        Route::get('/', function () { return view('layouts.layout'); });
        Route::resource('tickets', 'TicketController');
    });
});

Route::post('autentificar', 'LoginController@authenticate')->name('authenticate');
Route::post('cerrar-sesion', 'LoginController@logout')->name('logout');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/", "HomeController@index")->name("welcome");
Route::get("/type-ticket/get/{id}", "TypeTicketController@get")->name("typeTickets.get");
Route::get("/fila", "HomeController@fila")->name("client.fila");
Route::get("/fila/get", "HomeController@getFila")->name("client.getFila");
