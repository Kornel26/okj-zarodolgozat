@extends('layouts/app')

@section('title', 'Étlap')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header sticky-top" style="opacity: 1; background-color: #f7f7f7;">
                <h2>Étlap - {{$kategoria}}</h2>
                <div class="text-center">
                    <a href="{{route('etlap.index')}}" class="btn btn-primary">Összes</a>
                    <a href="{{route('etlap.show', "foetel")}}" class="btn btn-primary">Főételek</a>
                    <a href="{{route('etlap.show', "teszta")}}" class="btn btn-primary">Tészták</a>
                    <a href="{{route('etlap.show', "pizza")}}" class="btn btn-primary">Pizzák</a>
                    <a href="{{route('etlap.show', "hamburger")}}" class="btn btn-primary">Hamburgerek</a>
                    <a href="{{route('etlap.show', "salata")}}" class="btn btn-primary">Saláták</a>
                    <a href="{{route('etlap.show', "desszert")}}" class="btn btn-primary">Desszertek</a>
                    <a href="{{route('etlap.show', "udito")}}" class="btn btn-primary">Üdítők, italok</a>

                    <a href="#" class="btn btn-primary float-right">Vissza az oldal telejére</a>
                </div>
            </div>

            <div class="card-body">
                @forelse($etels as $etel)
                    <div class="card" style="width: 15rem; height: 15rem; margin: 10px; display: inline-grid;">
                        <img class="card-img-top" src="{{$etel->kep}}" alt="{{$etel->nev}}"/>
                        <div class="card-body">
                            <h5 class="card-title">{{$etel->nev}}</h5>
                            <p class="card-text">{{$etel->feltetek}}</p>
                            @switch($etel->kategoria)
                                @case('pizza')
                                <a class="btn btn-primary">Normál</a>
                                <a class="btn btn-primary">Családi</a>
                                @break
                                @default
                                <a class="btn btn-primary">Kosárba</a>
                            @endswitch
                            <p>{{$etel->ar}} -Ft</p>
                        </div>
                    </div>
                @empty
                    <h2>Az ételek nem megjeleníthetőek.</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
