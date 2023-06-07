<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController
{
    public function index(Request $request){

        //$series = DB::select('SELECT nome FROM series');
        //$series = Serie::all();
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series);
    }

    public function create(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        Serie::create($request->all());

        //return redirect()->route('series.index');
        return to_route('series.index');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        return to_route('series.index');
    }
}
