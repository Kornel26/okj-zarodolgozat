@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="width: 55rem;">
                <div class="card-header">Regisztráció</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div style="display: inline-block; float: left;">
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Vezetéknév</label>

                                <div class="col-md-6">
                                    <input id="vezeteknev" type="text" class="form-control" name="vezeteknev" value="{{ old('vezeteknev') }}" required autofocus>
                                </div>
                            @error('vezeteknev'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Keresztnév</label>

                                <div class="col-md-6">
                                    <input id="keresztnev" type="text" class="form-control" name="keresztnev" value="{{ old('keresztnev') }}" required>
                                </div>
                                @error('keresztnev'){{$message}}@enderror
                            </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail cím</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            @error('email'){{$message}}@enderror
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Jelszó</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            @error('password'){{$message}}@enderror
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Jelszó megerősítése</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            @error('password-confirm'){{$message}}@enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Regisztráció
                                </button>
                            </div>
                        </div>
                        </div>

                        <div style="display: inline-block; float: right;">
                            <div class="form-group row">
                                <label for="telefonszam" class="col-md-4 col-form-label text-md-right">Telefonszám</label>

                                <div class="col-md-6">
                                    <input id="telefonszam" type="text" class="form-control" name="telefonszam" value="{{ old('telefonszam') }}">
                                </div>
                                @error('telefonszam'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="iranyitoszam" class="col-md-4 col-form-label text-md-right">Irányítószám</label>

                                <div class="col-md-6">
                                    <input id="iranyitoszam" type="text" class="form-control" name="iranyitoszam" value="{{ old('iranyitoszam') }}">
                                </div>
                                @error('iranyitoszam'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="telepules" class="col-md-4 col-form-label text-md-right">Település</label>

                                <div class="col-md-6">
                                    <input id="telepules" type="text" class="form-control" name="telepules" value="{{ old('telepules') }}">
                                </div>
                                @error('telepules'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="utca" class="col-md-4 col-form-label text-md-right">Utca</label>

                                <div class="col-md-6">
                                    <input id="utca" type="text" class="form-control" name="utca" value="{{ old('utca') }}">
                                </div>
                                @error('utca'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="hazszam" class="col-md-4 col-form-label text-md-right">Házszám</label>

                                <div class="col-md-6">
                                    <input id="hazszam" type="text" class="form-control" name="hazszam" value="{{ old('hazszam') }}">
                                </div>
                                @error('hazszam'){{$message}}@enderror
                            </div>

                            <div class="form-group row">
                                <label for="egyeb" class="col-md-4 col-form-label text-md-right">Emelet / Ajtó / Kapucsengő</label>

                                <div class="col-md-6">
                                    <input id="egyeb" type="text" class="form-control" name="egyeb" value="{{ old('egyeb') }}">
                                </div>
                                @error('egyeb'){{$message}}@enderror
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
