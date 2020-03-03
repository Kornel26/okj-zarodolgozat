@extends('layouts.app')

@section('title', 'Ételek index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Ételek</h2>
            <a class="btn btn-primary" href="{{route('admin.')}}">Új étel felvétele</a>
                <div class="col-md-4" style="display: inline-block;">
                    <form action="{{route('admin.etels.search')}}" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Keresés</button>
                    </span>
                        </div>
                    </form>
                </div>
                <a class="btn btn-primary" href="{{route('admin.etels.index')}}">Összes lekérése</a>
            <a class="btn btn-primary float-right" href="{{route('admin.')}}">Vissza</a>
        </div>

        <div>
            <table class="table table-striped table-bordered">
                <thead>
                <th>Azonosító</th>
                <th>Név</th>
                <th>Ár</th>
                <th>Kategória</th>
                <th>Feltétek</th>
                <th>Funkciók</th>
                </thead>
                <tbody>
                @forelse($etels as $etel)
                    <tr>
                        <td>{{$etel->id}}</td>
                        <td>{{$etel->nev}}</td>
                        <td>{{$etel->ar}}</td>
                        <td>{{$etel->kategoria}}</td>
                        <td>{{$etel->feltetek}}</td>
                        <td>
                            <a href="{{route('admin.etels.edit', $etel->id)}}"><button class="btn btn-warning float-left" type="button">Módosítás</button></a>
                            <form action="{{route('admin.etels.destroy', $etel)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger float-left" type="submit">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><h1>Nincsenek ételek az adatbázisban!</h1></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
