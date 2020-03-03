@extends('layouts.app')

@section('title', 'Users index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Új szerep felvétele</h2>
            <a class="btn btn-primary float-right" href="{{route('admin.roles.index')}}">Vissza</a>
        </div>

        <div class="card-body">
            <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Név</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Felvétel</button>
            </form>
        </div>
    </div>
@endsection
