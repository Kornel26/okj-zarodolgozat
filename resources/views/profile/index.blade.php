@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Saját profil</h2>
            </div>

            <div class="card-body">
                <div class="">
                    <u class="h2">Belépési adatok</u>
                    <p><strong>Vezetéknév:</strong> {{$user->vezeteknev}}</p>
                    <p><strong>Keresztnév:</strong> {{$user->keresztnev}}</p>
                    <p><strong>E-Mail cím:</strong> {{$user->email}}</p>
                </div>

                <div class="">
                    <u class="h2">Rendelési adatok</u>
                    <p><strong>Telefonszám:</strong> {{$user->telefonszam}}</p>
                    <p><strong>Cím:</strong> {{$user->iranyitoszam}} {{$user->telepules}} {{$user->utca}} {{$user->hazszam}} {{$user->egyeb}}</p>
                </div>

                <div class="">
                    <u class="h2">Statisztikai adatok</u>
                    <p><strong>Regisztrált:</strong> {{$user->created_at}}</p>
                    <p><strong>Profil módosítva:</strong> {{$user->updated_at}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
