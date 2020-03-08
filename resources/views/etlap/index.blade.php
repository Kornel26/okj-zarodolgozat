@extends('layouts/app')

@section('title', 'Étlap')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header sticky-top" style="background-color: #f7f7f7;">
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
                    <form action="{{route('kosar.add')}}" method="POST" style="display: inline-block;">
                        <input type="hidden" value="{{$etel->id}}" id="id" name="etel[]">
                        <input type="hidden" value="{{$etel->nev}}" id="nev" name="etel[]">
                        <input type="hidden" value="{{$etel->ar}}" id="ar" name="etel[]">
                        @csrf
                        <div class="card" style="width: 15rem; margin: 10px; display: inline-flex; height: 475px;">
                            @if($etel->kep)
                                <img class="" style="width: 13rem; height: 13rem; margin: auto; padding-top: 1rem;"
                                     src="{{asset('storage/'.$etel->kep)}}" alt="{{$etel->nev}}"
                                     title="{{$etel->nev}}"/>
                            @else
                                <img class="" style="width: 13rem; height: 13rem; margin: auto; padding-top: 1rem;"
                                     src="{{asset('storage/kepek/not_found.png')}}" alt="A kép nem megjeleníthető"
                                     title="A kép nem megjeleníthető"/>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$etel->nev}}</h5>
                                <p class="card-text" style="height: 4em;">{{$etel->feltetek}}</p>
                                <p>{{$etel->ar}} -Ft</p>
                                <p>Mennyiség: <input type="number" name="etel[]" value="1" min="1"
                                                     style="width:50px; margin-top: 10px;">
                                </p>
                                <div style="display: inline-block;">
                                    <button class="btn btn-primary" type="submit">Kosárba</button>
                                </div>
                                @if($etel->kategoria=="pizza")
                                    <div style="display: inline-block; margin: 0; padding: 0; float: right; margin-right:30px;">
                                        <p style="margin: 0;"><input type="radio" id="normal" value="normal" name="etel[]" checked="checked">Normál</p>
                                        <p style="margin: 0;"><input type="radio" id="csaladi" value="csaladi" name="etel[]">Családi</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                @empty
                    <h2>Az ételek nem megjeleníthetőek.</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
