@extends('layouts.app')

@section('title', 'Felhasználók index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Felhasználók</h2>
            <div class="col-md-6" style="display: inline-block;">
                <form action="{{route('admin.users.search')}}" method="get">
                    <div class="input-group">
                        <select id="column" name="column">
                            <option value="id">Azonosító</option>
                            <option value="vezeteknev">Vezetéknév</option>
                            <option value="keresztnev">Keresztnév</option>
                            <option value="email">E-mail</option>
                            <option value="telefonszam">Telefonszám</option>
                            <option value="iranyitoszam">Irányítószám</option>
                            <option value="telepules">Település</option>
                            <option value="utca">Utca</option>
                            <option value="hazszam">Házszám</option>
                            <option value="egyeb">Emelet / Ajtó / Kapucsengő</option>
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
            <a class="btn btn-primary" href="{{route('admin.users.index')}}">Összes lekérése</a>
            <a class="btn btn-primary float-right" href="{{route('admin.')}}">Vissza</a>
        </div>

        <div>
            <table class="table table-striped table-bordered">
                <thead>
                <th>@sortablelink('id', 'Azonosító')</th>
                <th>@sortablelink('vezeteknev', 'Vezetéknév')</th>
                <th>@sortablelink('keresztnev', 'Keresztnév')</th>
                <th>@sortablelink('email', 'E-mail')</th>
                <th>@sortablelink('telefonszam', 'Telefonszám')</th>
                <th>@sortablelink('iranyitoszam', 'Irányítószám')</th>
                <th>@sortablelink('telepules', 'Település')</th>
                <th>@sortablelink('utca', 'Utca')</th>
                <th>@sortablelink('hazszam', 'Házszám')</th>
                <th>@sortablelink('egyeb', 'Emelet / Ajtó / Kapucsengő')</th>
                <th>Szerep(ek)</th>
                <th>Funkciók</th>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->vezeteknev}}</td>
                        <td>{{$user->keresztnev}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->telefonszam}}</td>
                        <td>{{$user->iranyitoszam}}</td>
                        <td>{{$user->telepules}}</td>
                        <td>{{$user->utca}}</td>
                        <td>{{$user->hazszam}}</td>
                        <td>{{$user->egyeb}}</td>
                        <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>
                            <a href="{{route('admin.users.edit', $user->id)}}">
                                <button class="btn btn-warning float-left" type="button">Módosítás</button>
                            </a>
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger float-left" type="submit">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="12"><h1>Nincsenek felhasználók az adatbázisban vagy a keresés nem volt megfelelő!</h1></td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
