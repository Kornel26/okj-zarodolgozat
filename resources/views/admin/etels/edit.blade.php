@extends('layouts.app')

@section('title', 'Étel módosítása')

@section('head')
    <script>
        window.onload = function () {
            document.getElementById("{{$etel->kategoria}}").selected = "true";
        }
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Étel módosítása</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.etels.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('admin.etels.update', $etel)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}

                <div class="form-group row">
                    <label for="nev" class="col-md-2 col-form-label text-md-right">Név</label>
                    <div class="col-md-6">
                        <input id="nev" type="text" class="form-control" name="nev" value="{{$etel->nev}}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ar" class="col-md-2 col-form-label text-md-right">Ár</label>
                    <div class="col-md-6">
                        <input id="ar" type="text" class="form-control" name="ar" value="{{$etel->ar}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kategoria" class="col-md-2 col-form-label text-md-right">Kategória</label>
                    <div class="col-md-6">
                        <select id="kategoria" name="kategoria">
                            <option value="" disabled selected>Válassz kategóriát</option>
                            <option id="foetel" value="foetel">Főétel</option>
                            <option id="teszta" value="teszta">Tészta</option>
                            <option id="pizza" value="pizza">Pizza</option>
                            <option id="hamburger" value="hamburger">Hamburger</option>
                            <option id="salata" value="salata">Saláta</option>
                            <option id="desszert" value="desszert">Desszert</option>
                            <option id="udito" value="udito">Üdítő, ital</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="feltetek" class="col-md-2 col-form-label text-md-right">Feltétek</label>
                    <div class="col-md-6">
                        <input id="feltetek" type="text" class="form-control" name="feltetek"value="{{$etel->feltetek}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kep" class="col-md-2 col-form-label text-md-right">Kép</label>
                    <input type="file" name="kep" value="{{$etel->kep}}">
                </div>

                <button class="btn btn-warning" type="submit">Módosítás</button>
            </form>
        </div>
    </div>
@endsection
