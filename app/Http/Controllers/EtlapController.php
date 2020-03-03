<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Etel;

class EtlapController extends Controller
{
    public function index()
    {
        $etels = Etel::all();
        $kategoria = 'Összes';

        return view('etlap.index', compact('etels', 'kategoria'));  // ->with('etels', $etels);
    }

    public function show($kategoria)
    {
        $etels = Etel::where('kategoria', $kategoria)->get();

        switch ($kategoria) {
            case 'foetel':
                $kategoria = 'Főételek';
                break;
            case 'teszta':
                $kategoria = 'Tészták';
                break;
            case 'pizza':
                $kategoria = 'Pizzák';
                break;
            case 'hamburger':
                $kategoria = 'Hamburgerek';
                break;
            case 'salata':
                $kategoria = 'Saláták';
                break;
            case 'desszert':
                $kategoria = 'Desszertek';
                break;
            case 'udito':
                $kategoria = 'Üdítők, italok';
                break;
        }

        return view('etlap.index', compact('etels', 'kategoria')); //['etels'=>$etels, 'kategoria'=>$kategoria] //->with('etels', $etels)
    }
}
