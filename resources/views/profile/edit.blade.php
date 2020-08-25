@extends('layouts.app')

@section('title', 'Profil módosítása')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="d-inline-block">Profil módosítása</h2>
                <a href="{{route('profile.index')}}" class="btn btn-primary float-right d-inline-block">Vissza</a>
            </div>

            <div class="card-body">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('profile.update', $user)}}" method="POST" enctype="multipart/form-data">
                    {{method_field('PATCH')}}
                    @csrf

                    <input type="hidden" value="{{$user->email}}" name="email">
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="form-group row">
                        <label for="vezeteknev" class="col-md-4 col-form-label text-md-right">Vezetéknév</label>
                        <div class="col-md-6">
                            <input id="vezeteknev" type="text" class="form-control" name="vezeteknev"
                                   value="{{ $user->vezeteknev }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keresztnev" class="col-md-4 col-form-label text-md-right">Keresztnév</label>
                        <div class="col-md-6">
                            <input id="vezeteknev" type="text" class="form-control" name="keresztnev"
                                   value="{{ $user->keresztnev }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefonszam" class="col-md-4 col-form-label text-md-right">Telefonszám</label>
                        <div class="col-md-6">
                            <input id="telefonszam" type="text" class="form-control" name="telefonszam"
                                   value="{{ $user->telefonszam }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="iranyitoszam" class="col-md-4 col-form-label text-md-right">Irányítószám</label>
                        <div class="col-md-6">
                            <input id="iranyitoszam" type="text" class="form-control" name="iranyitoszam"
                                   value="{{ $user->iranyitoszam }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepules" class="col-md-4 col-form-label text-md-right">Település</label>
                        <div class="col-md-6">
                            <input id="telepules" type="text" class="form-control" name="telepules"
                                   value="{{ $user->telepules }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="utca" class="col-md-4 col-form-label text-md-right">Utca</label>
                        <div class="col-md-6">
                            <input id="utca" type="text" class="form-control" name="utca"
                                   value="{{ $user->utca }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hazszam" class="col-md-4 col-form-label text-md-right">Házszám</label>
                        <div class="col-md-6">
                            <input id="hazszam" type="text" class="form-control" name="hazszam"
                                   value="{{ $user->hazszam }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="egyeb" class="col-md-4 col-form-label text-md-right">Emelet / Ajtó / Kapucsengő</label>
                        <div class="col-md-6">
                            <input id="egyeb" type="text" class="form-control" name="egyeb"
                                   value="{{ $user->egyeb }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Módosítás</button>
                </form>
            </div>
        </div>
    </div>
@endsection
