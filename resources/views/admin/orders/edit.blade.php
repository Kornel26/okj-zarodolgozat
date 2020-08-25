@extends('layouts.app')

@section('title', 'Rendelés módosítása')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Rendelés módosítása</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.orders.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('admin.orders.update', $order)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group row">
                    <label for="id" class="col-md-2 col-form-label text-md-right">Azonosító</label>
                    <div class="col-md-6">
                        <input id="id" type="text" class="form-control" name="id" value="{{$order->id}}" required readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-2 col-form-label text-md-right">Felhasználó ID</label>
                    <div class="col-md-6">
                        <input id="user_id" type="text" class="form-control" name="user_id" value="{{$order->user_id}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fizetes_modja" class="col-md-2 col-form-label text-md-right">Fizetés módja</label>
                    <div class="col-md-6">
                        <input id="fizetes_modja" type="text" class="form-control" name="fizetes_modja" value="{{$order->fizetes_modja}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="megjegyzes" class="col-md-2 col-form-label text-md-right">Megjegyzés</label>
                    <div class="col-md-6">
                        <input id="megjegyzes" type="text" class="form-control" name="megjegyzes" value="{{$order->megjegyzes}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="allapot" class="col-md-2 col-form-label text-md-right">Állapot</label>
                    <div class="col-md-6">
                        <input id="allapot" type="text" class="form-control" name="allapot" value="{{$order->allapot}}" required readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fizetendo_osszeg" class="col-md-2 col-form-label text-md-right">Fizetendő összeg</label>
                    <div class="col-md-6">
                        <input id="fizetendo_osszeg" type="text" class="form-control" name="fizetendo_osszeg" value="{{$order->fizetendo_osszeg}}" required readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rendelo_adatai" class="col-md-2 col-form-label text-md-right">Rendelő adatai</label>
                    <div class="col-md-6">
                        <input id="rendelo_adatai" type="text" class="form-control" name="rendelo_adatai" value="{{$order->rendelo_adatai}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="created_at" class="col-md-2 col-form-label text-md-right">Rendelés ideje</label>
                    <div class="col-md-6">
                        <input id="created_at" type="text" class="form-control" name="created_at" value="{{$order->created_at}}" required readonly>
                    </div>
                </div>

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

                <button class="btn btn-warning" type="submit">Módosítás</button>
            </form>
        </div>
    </div>
@endsection
