<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\OrdersController;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class
RendelesekController extends Controller
{
    public function add(Request $request)
    {
        //dd($request);
        OrdersController::order($request);
        return redirect()->route('etlap.index')->with('success', 'Siker! A rendelését rögzítettük, hamarosan feldolgozásra kerül!');
    }
}
