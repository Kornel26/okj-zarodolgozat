@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="d-inline-block">Saját profil</h2>
                <a href="{{route('profile.edit')}}" class="btn btn-warning float-right d-inline-block">Profil
                    módosítása</a>
            </div>

            <div class="card-body">
                <table style="width: 100%;">
                    <tr>
                        <td class="text-center">
                            <h3><u>Belépési adatok</u></h3>
                            <div><strong>Teljes név:</strong> {{$user->vezeteknev}} {{$user->keresztnev}}</div>
                            <div><strong>E-Mail cím:</strong> {{$user->email}}</div>
                        </td>

                        <td class="text-center">
                            <h3><u>Rendelési adatok</u></h3>
                            <div><strong>Telefonszám:</strong> {{$user->telefonszam}}</div>
                            <div>
                                <strong>Cím:</strong>{{$user->iranyitoszam}} {{$user->telepules}} {{$user->utca}} {{$user->hazszam}} {{$user->egyeb}}
                            </div>
                        </td>

                        <td class="text-center">
                            <h3><u>Statisztikai adatok</u></h3>
                            <div><strong>Regisztrált:</strong> {{$user->created_at}}</div>
                            <div><strong>Profil módosítva:</strong> {{$user->updated_at}}</div>
                        </td>
                    </tr>
                </table>

                @if(count($orders) > 0)
                    <div style="margin-top: 50px;">
                        <h2 class="text-center" style="margin-bottom: 10px;">Eddigi rendelések</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th>Fizetés módja</th>
                            <th>Megjegyzés</th>
                            <th>Állapot</th>
                            <th>Fizetendő összeg</th>
                            <th>Rendeléskor megadott adatok</th>
                            <th>Rendelés ideje</th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->fizetes_modja}}</td>
                                    <td>{{$order->megjegyzes}}</td>
                                    <td>{{$order->allapot}}</td>
                                    <td>{{$order->fizetendo_osszeg}}</td>
                                    <td>{{$order->rendelo_adatai}}</td>
                                    <td>{{$order->created_at}}</td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
