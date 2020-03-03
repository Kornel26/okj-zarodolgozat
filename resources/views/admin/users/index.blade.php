@extends('layouts.app')

@section('title', 'Users index')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Felhasználók</h2>
        <a class="btn btn-primary float-right" href="{{route('admin.')}}">Vissza</a>
    </div>

    <div>
    <table class="table table-striped table-bordered">
        <thead>
        <th>Azonosító</th>
        <th>Vezetéknév</th>
        <th>Keresztnév</th>
        <th>E-mail</th>
        <th>Telefonszám</th>
        <th>Irányítószám</th>
        <th>Település</th>
        <th>Utca</th>
        <th>Házszám</th>
        <th>Emelet / Ajtó / Kapucsengő</th>
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
                    <a href="{{route('admin.users.edit', $user->id)}}"><button class="btn btn-warning float-left" type="button">Módosítás</button></a>
                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger float-left" type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>Nincsenek felhasználók az adatbázisban</tr>
        @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
