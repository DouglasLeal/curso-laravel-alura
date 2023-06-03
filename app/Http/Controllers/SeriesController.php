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

    public function criar(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        $nome = $request->input('nome');

        //DB::insert('INSERT INTO series (nome) VALUES (?)', [$nome]);

        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();

        return redirect('/series');
    }
}
