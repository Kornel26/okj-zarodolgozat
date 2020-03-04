<?php

namespace App\Http\Controllers\Admin;

use App\Etel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "<script>alert('index');</script>";
        $etels = Etel::sortable()->get();
        return view('admin.etels.index', compact('etels'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "<script>alert('create');</script>";
        return view('admin.etels.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "<script>alert('store');</script>";
        $etel = Etel::create($this->validateRequest());

        $this->storeImage($etel);

        return $this->index();
    }

    private function validateRequest()
    {
        //echo "<script>alert('validateRequest');</script>";
        return request()->validate([
            'nev' => 'required|max:30',
            'ar' => 'required',
            'kategoria' => 'required|max:20',
            'feltetek' => 'max:255',
            'kep' => 'file|image|max:5000'
        ]);
    }

    private function storeImage($etel)
    {
        //echo "<script>alert('storeImage');</script>";
        if (request()->has('kep')) {
            $etel->update([
                'kep' => request()->kep->store('kepek', 'public')
            ]);
        }
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
    public function edit(Etel $etel)
    {
        return view('admin.etels.edit')->with(['etel' => $etel]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etel $etel)
    {
        $etel->update($this->validateRequest());

        $this->storeImage($etel);

        return redirect()->route('admin.etels.index');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etel $etel)
    {
        $etel->delete();
        return redirect()->route('admin.etels.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $column = $request->get('column');
        $type = $request->get('type');

        if($type == 'reszleges')
            $etels = Etel::where($column, 'LIKE', '%' . $search . '%')->get();
        else if($type == 'teljes')
            $etels = Etel::where($column, $search)->get();

        return view('admin.etels.index', compact('etels'));
    }
}
