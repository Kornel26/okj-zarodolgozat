<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Order;
use App\Tetel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
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
        $orders = Order::sortable()->orderBy('allapot', 'asc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    static public function order($r) // r = request
    {
        $rendeles = new Order();
        if ($r->user_id != null) $rendeles->user_id = $r->user_id;
        $rendeles->fizetes_modja = $r->fizetes;
        if ($r->megjegyzes != null) $rendeles->megjegyzes = $r->megjegyzes;
        $rendeles->allapot = "fuggoben";
        $rendeles->rendelo_adatai = $r->nev . ";" . $r->email . ";" . $r->telefonszam . ";" . $r->cim;
        $rendeles->fizetendo_osszeg = $r->fizetendo_osszeg;
        //dd($rendeles);
        $rendeles->save();

        $id = $rendeles->id;

        foreach ($r->etelek as $key => $value) {
            $tetel = new Tetel;
            $tetel->rendeles_id = $id;
            $tetel->mennyiseg = $value;

            if (strpos($key, 'n') !== false) { //pizza-e? ha igen, kivesszük belőle a kódot
                $tetel->pizza_meret = "normál";
                $etel_id = $key;
                $etel_id = str_replace('n', '', $etel_id);
                $tetel->etel_id = $etel_id;
            } else if (strpos($key, 'cs') !== false) {
                $tetel->pizza_meret = "családi";
                $etel_id = $key;
                $etel_id = str_replace('cs', '', $etel_id);
                $tetel->etel_id = $etel_id;
            } else {
                $tetel->etel_id = $key;
            }

            $tetel->save();
        }
        session()->forget('kosar');
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
    public function edit(Order $order)
    {
        $tetelek = DB::table('tetels')->where('rendeles_id', $order->id)->get();
        $etelek = DB::table('etels')->get();
        return view('admin.orders.edit')->with(['order' => $order, 'tetelek' => $tetelek, 'etelek' => $etelek]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
        $data = $this->validateRequest();

        $order->update($data);

        return redirect()->route('admin.orders.index');
    }

    private function validateRequest()
    {
        return request()->validate([
            'id' => 'required',
            'user_id' => 'sometimes',
            'fizetes_modja' => 'required|max:10',
            'megjegyzes' => 'sometimes|max:255',
            'allapot' => 'required|max:20',
            'fizetendo_osszeg' => 'required',
            'rendelo_adatai' => 'required|max:255',
        ]);
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        DB::table('tetels')->where('rendeles_id', $order->id)->delete();
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $column = $request->get('column');
        $type = $request->get('type');

        if ($type == 'reszleges')
            $orders = Order::where($column, 'LIKE', '%' . $search . '%')->get();
        else if ($type == 'teljes')
            $orders = Order::where($column, $search)->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function confirm(Order $order)
    {
        $tetelek = DB::table('tetels')->where('rendeles_id', $order->id)->get();
        $etelek = DB::table('etels')->get();
        //dd($tetelek);
        //dd($etelek);
        return view('admin.orders.confirm')->with(['order' => $order, 'tetelek' => $tetelek, 'etelek' => $etelek]);
    }

    public function finalConfirm(Order $order)
    {
        //dd($order);
        $data = $order;
        $data->allapot = "megerositve";
        $data->save();

        $orderData = explode(';', $data->rendelo_adatai);
        $tetelek = DB::table('tetels')->where('rendeles_id', $order->id)->get();
        $etelek = DB::table('etels')->get();

        Mail::to($orderData[1])->send(new OrderMail($orderData, $order, $tetelek, $etelek));

        return redirect()->route('admin.orders.index');
    }


}
