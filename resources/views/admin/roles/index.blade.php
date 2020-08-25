@extends('layouts.app')

@section('title', 'Roles index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Szerepek</h2>
            <a class="btn btn-primary" href="{{route('admin.roles.create')}}">Új szerep felvétele</a>
            <a class="btn btn-primary float-right" href="{{route('admin.')}}">Vissza</a>
        </div>

        <div>
            <table class="table table-striped table-bordered">
                <thead>
                <th>@sortablelink('id','Azonosító')</th>
                <th>@sortablelink('name','Név')</th>
                <th>Funkciók</th>
                </thead>
                <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            @if($role->id > 2)
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger float-left" type="submit">Törlés</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="3"><h1>Nincsenek szerepek az adatbázisban!</h1></td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
