<?php
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

Route::resource('/series', SeriesController::class)
    ->only(['index', 'create', 'store', 'destroy']);

//Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])
//    ->name('series.destroy');
