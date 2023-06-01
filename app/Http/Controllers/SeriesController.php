<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController
{
    public function index(Request $request){
        $series = [
            'Punisher',
            'Lost',
            'Grey\'s Anatomy'
        ];

        return view('series/index', compact('series'));
    }
}
