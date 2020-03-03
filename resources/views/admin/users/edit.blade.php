@extends('layouts.app')

@section('title', 'Users index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Felhasználó módosítása</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.users.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('admin.users.update', $user)}}" method="POST">

                <div class="form-group row">
                    <label for="vezeteknev" class="col-md-2 col-form-label text-md-right">Vezetéknév</label>
                    <div class="col-md-6">
                        <input id="vezeteknev" type="text" class="form-control" name="vezeteknev"
                               value="{{ $user->vezeteknev }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keresztnev" class="col-md-2 col-form-label text-md-right">Keresztnév</label>
                    <div class="col-md-6">
                        <input id="keresztnev" type="text" class="form-control" name="keresztnev"
                               value="{{ $user->keresztnev }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email}}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefonszam" class="col-md-2 col-form-label text-md-right">Telefonszám</label>
                    <div class="col-md-6">
                        <input id="telefonszam" type="text" class="form-control" name="telefonszam"
                               value="{{ $user->telefonszam }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="iranyitoszam" class="col-md-2 col-form-label text-md-right">Iranyítószám</label>
                    <div class="col-md-6">
                        <input id="iranyitoszam" type="text" class="form-control" name="iranyitoszam"
                               value="{{ $user->iranyitoszam }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telepules" class="col-md-2 col-form-label text-md-right">Település</label>
                    <div class="col-md-6">
                        <input id="telepules" type="text" class="form-control" name="telepules"
                               value="{{ $user->telepules }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="utca" class="col-md-2 col-form-label text-md-right">Utca</label>
                    <div class="col-md-6">
                        <input id="utca" type="text" class="form-control" name="utca" value="{{ $user->utca }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hazszam" class="col-md-2 col-form-label text-md-right">Házszám</label>
                    <div class="col-md-6">
                        <input id="hazszam" type="text" class="form-control" name="hazszam"
                               value="{{ $user->hazszam }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="egyeb" class="col-md-2 col-form-label text-md-right">Emelet / Ajtó / Kapucsengő</label>
                    <div class="col-md-6">
                        <input id="egyeb" type="text" class="form-control" name="egyeb" value="{{ $user->egyeb }}">
                    </div>
                </div>

                @csrf

                {{method_field('PUT')}}
                <div class="form-group row">
                    <label for="roles" class="col-md-2 col-form-label text-md-right">Szerepek</label>
                    <div class="col-md-6">
                        @foreach($roles as $role)
                            <div>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                       @if($user->roles->contains($role->id)) checked=checked @endif/>
                                <label>{{$role->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-warning" type="submit">Módosítás</button>
            </form>
        </div>
    </div>
@endsection
