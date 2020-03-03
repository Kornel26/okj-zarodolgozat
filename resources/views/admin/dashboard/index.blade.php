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
                        <div><a class="btn btn-primary" href="{{route('admin.users.index')}}">Felhasználók</a></div><br>
                        <div><a class="btn btn-primary" href="{{route('admin.etels.index')}}">Ételek</a></div><br>
                        <div><a class="btn btn-primary" href="{{route('admin.roles.index')}}">Szerepek</a></div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
