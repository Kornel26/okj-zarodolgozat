@extends('layouts.app')

@section('title', 'Admin dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Adminisztráció - Adatbázis táblák</h2>
                    </div>

                    <div class="card-body">
                        <div>
                            <div class="d-inline"><a class="btn btn-primary btn-lg" href="{{route('admin.orders.index')}}">Rendelések</a></div>
                            <div class="d-inline"><a class="btn btn-primary btn-lg" href="{{route('admin.users.index')}}">Felhasználók</a></div>
                            <div class="d-inline"><a class="btn btn-primary btn-lg" href="{{route('admin.etels.index')}}">Ételek</a></div>
                            <div class="d-inline"><a class="btn btn-primary btn-lg" href="{{route('admin.roles.index')}}">Szerepek</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
