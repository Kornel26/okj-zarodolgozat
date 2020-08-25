@extends('layouts.app')

@section('title', 'Rendelés megerősítése')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Rendelés megerősítése</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.orders.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            <form action="{{route('admin.orders.finalConfirm', $order)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <table class="table border">
                    <h2>Rendelés adatai</h2>
                    <thead>
                    <th>Azonosító</th>
                    <th>Felhasználó ID</th>
                    <th>Fizetés módja</th>
                    <th>Megjegyzés</th>
                    <th>Állapot</th>
                    <th>Fizetendő összeg</th>
                    <th>Rendelő adatai</th>
                    <th>Rendelés ideje</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->fizetes_modja}}</td>
                        <td>{{$order->megjegyzes}}</td>
                        <td>{{$order->allapot}}</td>
                        <td>{{$order->fizetendo_osszeg}}</td>
                        <td>{{$order->rendelo_adatai}}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    </tbody>
                </table>

                <table class="table border">
                    <h2>Rendelt ételek</h2>
                    <thead>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Mennyiség</th>
                        <th>Méret</th>
                    </thead>
                    <tbody>
                        @foreach($tetelek as $tetel)
                            <tr>
                                <td>{{$tetel->etel_id}}</td>
                                <td>{{$etelek[$tetel->etel_id]->nev}}</td>
                                <td>{{$tetel->mennyiseg}}</td>
                                <td>{{$tetel->pizza_meret}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn btn-success" type="submit">Megerősítés</button>
            </form>
            <form action="{{route('admin.orders.destroy', $order)}}" method="POST" style="padding-top: 5px;">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit">Törlés</button>
            </form>
        </div>
    </div>
@endsection
