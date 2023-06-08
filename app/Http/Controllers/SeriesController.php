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
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso.");

        //return redirect()->route('series.index');
        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request){
        //Serie::destroy($series->id);
        $series->delete();

        //$request->session()->put('mensagem.sucesso', 'Série removida com sucesso.');
        $request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso.");

        return to_route('series.index');
    }
}
