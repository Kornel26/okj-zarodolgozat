@extends('layouts.app')

@section('title', 'Étel módosítása')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Étel módosítása</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.etels.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            <form action="{{route('admin.etels.update', $etel)}}" method="POST">
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
                    <label for="kep" class="col-md-2 col-form-label text-md-right">Kép</label>
                    <div class="col-md-6">
                        <input id="kep" type="text" class="form-control" name="kep" value="{{$etel->kep}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kategoria" class="col-md-2 col-form-label text-md-right">Kategória</label>
                    <div class="col-md-6">
                        <input id="kategoria" type="text" class="form-control" name="kategoria" value="{{$etel->kategoria}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="feltetek" class="col-md-2 col-form-label text-md-right">Feltétek</label>
                    <div class="col-md-6">
                        <input id="feltetek" type="text" class="form-control" name="feltetek"value="{{$etel->feltetek}}">
                    </div>
                </div>

                <button class="btn btn-warning" type="submit">Módosítás</button>
            </form>
        </div>
    </div>
@endsection
