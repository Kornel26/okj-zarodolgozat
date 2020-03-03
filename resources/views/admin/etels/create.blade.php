@extends('layouts.app')

@section('title', 'Új étel felvétele')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Új étel felvétele</h2>
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
            <form action="{{route('admin.etels.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="nev" class="col-md-2 col-form-label text-md-right">Név</label>
                    <div class="col-md-6">
                        <input id="nev" type="text" class="form-control" name="nev" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ar" class="col-md-2 col-form-label text-md-right">Ár</label>
                    <div class="col-md-6">
                        <input id="ar" type="text" class="form-control" name="ar" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kategoria" class="col-md-2 col-form-label text-md-right">Kategória</label>
                    <div class="col-md-6">
                        <input id="kategoria" type="text" class="form-control" name="kategoria" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="feltetek" class="col-md-2 col-form-label text-md-right">Feltétek</label>
                    <div class="col-md-6">
                        <input id="feltetek" type="text" class="form-control" name="feltetek">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kep" class="col-md-2 col-form-label text-md-right">Kép</label>
                    <input type="file" name="kep">
                </div>

                <button class="btn btn-primary" type="submit">Felvétel</button>
            </form>
        </div>
    </div>
@endsection
