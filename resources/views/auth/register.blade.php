@extends('layouts.app')

@section('title', 'Regisztráció')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Regisztráció</h2></div>

                    <div class="card-body">
                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        @endif
                        <p><strong>A *-al jelölt mezők kitöltése kötelező!</strong></p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="float-left" style="width: 50%;">
                                <div class="form-group row">

                                    <label for="name" class="col-md-4 col-form-label text-md-right">Vezetéknév *</label>

                                    <div class="col-md-6">
                                        <input id="vezeteknev" type="text" class="form-control" name="vezeteknev"
                                               value="{{ old('vezeteknev') }}" onchange="vVezeteknev();" required autofocus>
                                        <strong class="register-error" id="vezeteknevError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Keresztnév *</label>

                                    <div class="col-md-6">
                                        <input id="keresztnev" type="text" class="form-control" name="keresztnev"
                                               value="{{ old('keresztnev') }}" onchange="vKeresztnev();" required>
                                        <strong class="register-error" id="keresztnevError"></strong>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail cím *</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" onchange="vEmail();" required autocomplete="email">
                                        <strong class="register-error" id="emailError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Jelszó *</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               onchange="vJelszo(); vJelszoRe();" required>
                                        <strong class="register-error" id="jelszoError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Jelszó
                                        megerősítése *</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" onchange="vJelszoRe();" required>
                                        <strong class="register-error" id="jelszoujraError"></strong>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Regisztráció
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right" style="width: 50%;">
                                <div class="form-group row">
                                    <label for="telefonszam"
                                           class="col-md-4 col-form-label text-md-right">Telefonszám</label>

                                    <div class="col-md-6">
                                        <input id="telefonszam" type="text" class="form-control" name="telefonszam"
                                               value="{{ old('telefonszam') }}" onchange="vTelefonszam();">
                                        <strong class="register-error" id="telefonszamError"></strong>
                                        <strong id="telefonszamHelp"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="iranyitoszam"
                                           class="col-md-4 col-form-label text-md-right">Irányítószám</label>

                                    <div class="col-md-6">
                                        <input id="iranyitoszam" type="text" class="form-control" name="iranyitoszam"
                                               value="{{ old('iranyitoszam') }}" onchange="vIranyitoszam();">
                                        <strong class="register-error" id="iranyitoszamError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telepules"
                                           class="col-md-4 col-form-label text-md-right">Település</label>

                                    <div class="col-md-6">
                                        <input id="telepules" type="text" class="form-control" name="telepules"
                                               value="{{ old('telepules') }}" onchange="vTelepules();">
                                        <strong class="register-error" id="telepulesError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="utca" class="col-md-4 col-form-label text-md-right">Utca</label>
                                    <div class="col-md-6">
                                        <input id="utca" type="text" class="form-control" name="utca"
                                               value="{{ old('utca') }}" onchange="vUtca();">
                                        <strong class="register-error" id="utcaError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="hazszam" class="col-md-4 col-form-label text-md-right">Házszám</label>

                                    <div class="col-md-6">
                                        <input id="hazszam" type="text" class="form-control" name="hazszam"
                                               value="{{ old('hazszam') }}" onchange="vHazszam();">
                                        <strong class="register-error" id="hazszamError"></strong>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="egyeb" class="col-md-4 col-form-label text-md-right">Emelet / Ajtó /
                                        Kapucsengő</label>

                                    <div class="col-md-6">
                                        <input id="egyeb" type="text" class="form-control" name="egyeb"
                                               value="{{ old('egyeb') }}" onchange="vEgyeb();">
                                        <strong class="register-error" id="egyebError"></strong>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
