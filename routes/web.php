<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/series', [SeriesController::class, "index"]);
//Route::get('/series/novo', [SeriesController::class, "criar"]);
//Route::post('/series/salvar', [SeriesController::class, "store"]);

//Route::controller(SeriesController::class)->group(function(){
//    Route::get('/series', "index")->name('series.index');
//    Route::get('/series/novo', "criar")->name('series.create');
//    Route::post('/series/salvar', "store")->name('series.store');
//});

//Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])
//    ->name('series.destroy');

//Route::resource('/series', SeriesController::class)
//    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');


