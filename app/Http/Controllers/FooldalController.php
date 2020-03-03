<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooldalController extends Controller
{
    public function index()
    {
        return view('fooldal/index');
    }
}
