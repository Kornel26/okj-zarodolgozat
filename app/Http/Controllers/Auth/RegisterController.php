<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /*
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'vezeteknev' => ['required', 'string', 'min:3', 'max:15'],
            'keresztnev' => ['required', 'string', 'min:3', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telefonszam' => ['string', 'max:15', 'nullable'],
            'iranyitoszam' => ['string', 'max:4', 'nullable'],
            'telepules' => ['string', 'max:30', 'nullable'],
            'utca' => ['string', 'max:20', 'nullable'],
            'hazszam' => ['string', 'max:5', 'nullable'],
            'egyeb' => ['string', 'max:20', 'nullable'],
        ]);
    }

    /*
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'vezeteknev' => $data['vezeteknev'],
            'keresztnev' => $data['keresztnev'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefonszam' => $data['telefonszam'],
            'iranyitoszam' => $data['iranyitoszam'],
            'telepules' => $data['telepules'],
            'utca' => $data['utca'],
            'hazszam' => $data['hazszam'],
            'egyeb' => $data['egyeb'],
        ]);

        $role = Role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return $user;
    }
}
