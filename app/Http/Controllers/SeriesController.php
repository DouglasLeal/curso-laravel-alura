<?php

namespace App\Http\Controllers;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController
{
    public function index(Request $request){

        //$series = DB::select('SELECT nome FROM series');
        $series = Serie::all();
        //$series = Serie::query()->orderBy('nome')->get();
        //$series = Serie::with(['temporadas'])->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $request){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){
        $serie = Serie::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->temporadas as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'numero' => $j
                ];
            }
        }
        Episode::insert($episodes);

        //$request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso.");

        //return redirect()->route('series.index');
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso.");
    }

    public function edit(Serie $series){
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request){
        //$series->nome = $request->nome;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' editada com sucesso.");
    }

    public function destroy(Serie $series, Request $request){
        //Serie::destroy($series->id);
        $series->delete();

        //$request->session()->put('mensagem.sucesso', 'Série removida com sucesso.');
        //$request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso.");

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso.");
    }
}
