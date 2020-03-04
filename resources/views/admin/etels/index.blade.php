@extends('layouts.app')

@section('title', 'Ételek index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Ételek</h2>
            <a class="btn btn-primary" href="{{route('admin.etels.create')}}">Új étel felvétele</a>
            <div class="col-md-5" style="display: inline-block;">
                <form action="{{route('admin.etels.search')}}" method="get">
                    <div class="input-group">
                        <select id="column" name="column">
                            <option value="id">Azonosító</option>
                            <option value="nev">Név</option>
                            <option value="ar">Ár</option>
                            <option value="kategoria">Kategória</option>
                            <option value="feltetek">Feltétek</option>
                            <option value="kep">Kép</option>
                        </select>
                        <select id="type" name="type">
                            <option value="reszleges">Részleges egyezés</option>
                            <option value="teljes">Teljes egyezés</option>
                        </select>
                        <input type="search" name="search" class="form-control"
                               placeholder="<-- Mire és hogyan szeretne keresni?">
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
                <th>@sortablelink('id', 'Azonosító')</th>
                <th>@sortablelink('nev', 'Név')</th>
                <th>@sortablelink('ar', 'Ár')</th>
                <th>@sortablelink('kategoria', 'Kategória')</th>
                <th>@sortablelink('feltetek', 'Feltétek')</th>
                <th>@sortablelink('kep', 'Kép')</th>
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
                        <td>{{$etel->kep}}</td>
                        <td>
                            <a href="{{route('admin.etels.edit', $etel->id)}}">
                                <button class="btn btn-warning float-left" type="button">Módosítás</button>
                            </a>
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
