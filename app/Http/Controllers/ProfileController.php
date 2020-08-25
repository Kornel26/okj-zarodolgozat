<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $orders = DB::table('orders')->where('user_id', Auth::id())->get();
        return view('profile.index')->with(['user' => Auth::user(), 'orders' => $orders]);
    }

    public function edit()
    {
        return view('profile.edit')->with('user', Auth::user());
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'vezeteknev' => ['required', 'string', 'min:3', 'max:15'],
            'keresztnev' => ['required', 'string', 'min:3', 'max:15'],
            'telefonszam' => ['string', 'max:15', 'nullable'],
            'iranyitoszam' => ['string', 'max:4', 'nullable'],
            'telepules' => ['string', 'max:30', 'nullable'],
            'utca' => ['string', 'max:20', 'nullable'],
            'hazszam' => ['string', 'max:5', 'nullable'],
            'egyeb' => ['string', 'max:20', 'nullable'],
        ]);

        DB::table('users')->where('id', $request->id)->update([
           'vezeteknev'=>$request->vezeteknev,
           'keresztnev'=>$request->keresztnev,
           'telefonszam'=>$request->telefonszam,
           'iranyitoszam'=>$request->iranyitoszam,
           'telepules'=>$request->telepules,
           'utca'=>$request->utca,
           'hazszam'=>$request->hazszam,
           'egyeb'=>$request->egyeb,
        ]);

        return redirect()->route('profile.index');
    }
}
