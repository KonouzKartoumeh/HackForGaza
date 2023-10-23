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

    Route::get('/', 'App\Http\Controllers\DateframeInfoController@create');
    Route::post('/dateframeInfo', 'App\Http\Controllers\DateframeInfoController@store')->name('dateframes_Info.store');
    Route::get('/admin/dateframe-info', 'App\Http\Controllers\DateFrameInfoController@index')->name('admin.dateframe-info.index')->middleware('auth');
    Route::get('/dateframe-info/{id}/edit', 'App\Http\Controllers\DateframeInfoController@edit')->name('dateframe-info.edit');
    Route::put('/dateframe-info/{id}', 'App\Http\Controllers\DateframeInfoController@update')->name('dateframe-info.update');

});