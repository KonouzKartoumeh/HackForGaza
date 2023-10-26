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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/', 'App\Http\Controllers\EventInfoController@create');
    Route::post('/eventInfo', 'App\Http\Controllers\EventInfoController@store')->name('events_Info.store');
    Route::get('/admin/event-info', 'App\Http\Controllers\EventInfoController@index')->name('admin.event-info.index')->middleware('auth');
    Route::get('/event-info/{id}/edit', 'App\Http\Controllers\EventInfoController@edit')->name('event-info.edit');
    Route::put('/event-info/{id}', 'App\Http\Controllers\EventInfoController@update')->name('event-info.update');

});

Route::get('/resource-links', 'App\Http\Controllers\ResourceLinkController@index')->name('resource-links.index');
