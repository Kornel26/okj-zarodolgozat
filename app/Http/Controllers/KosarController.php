<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etel;
use Illuminate\Support\Facades\Auth;

class KosarController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('kosar.index', compact('user', $user));
    }

    public function add(Request $request)
    {
        $etel = $request->etel; //A formból kinyerjük az adatokat (étel tömb)

        if ($request->session()->has('kosar'))   //A sessionből kinyerjük a kosár tartalmát, ha még nincs, csinálunk egyet.
            $kosar = $request->session()->get('kosar');
        else
            $kosar = array();

        $etel[3] *= 1; //Életmennyiség integerré alakítása

        if (count($etel) == 5) { //Azonosítóhoz a pizza méretének hozzáadása (normál/családi)
            if ($etel[4] == 'normal')
                $etel[0] .= 'n';
            else
                $etel[0] .= 'cs';
        }

        if ($kosar != null) {
            if (array_key_exists($etel[0], $kosar)) {
                $tmp = $kosar[$etel[0]];
                $tmp[3] = $tmp[3] + $etel[3];
                $kosar[$etel[0]] = $tmp;
            } else {
                $kosar += [$etel[0] => $etel];
            }
        } else {
            $kosar = [$etel[0] => $etel];
        }

        $request->session()->forget('kosar');
        $request->session()->put('kosar', $kosar);
        //dd($request->session()->get('kosar'));
        return redirect()->back();
        //return redirect()->route('etlap.index');
    }

    public function empty(Request $request)
    {
        if ($request->session()->has('kosar'))
            $request->session()->forget('kosar');

        return redirect()->route('kosar.index');
    }

    public function delete(Request $request)
    {
        $kosar = $request->session()->get('kosar');
        unset($kosar[$request->id]);

        if(count($kosar) > 0)
            $request->session()->put('kosar', $kosar);
        else
            $request->session()->forget('kosar');

        return redirect()->route('kosar.index');
    }

    public function numInc(Request $request)
    {
        $id = $request->id;
        $kosar = $request->session()->get('kosar');

        if ($kosar[$id][3] < 999) $kosar[$id][3]++;

        $request->session()->forget('kosar');
        $request->session()->put('kosar', $kosar);

        return redirect()->route('kosar.index');
    }

    public function numDesc(Request $request)
    {
        $id = $request->id;
        $kosar = $request->session()->get('kosar');

        if ($kosar[$id][3] > 1) $kosar[$id][3]--;

        $request->session()->forget('kosar');
        $request->session()->put('kosar', $kosar);

        return redirect()->route('kosar.index');
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
