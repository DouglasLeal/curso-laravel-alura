<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController
{
    public function index(Request $request){

        $series = DB::select('SELECT nome FROM series');

        return view('series.index')->with('series', $series);
    }

    public function criar(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        $nome = $request->input('nome');

        DB::insert('INSERT INTO series (nome) VALUES (?)', [$nome]);

        return redirect('/series');
    }
}
