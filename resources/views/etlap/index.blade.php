@extends('layouts/app')

@section('title', 'Étlap')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header sticky-top" style="background-color: #f7f7f7; z-index: 1;">
                <h2>{{$kategoria}}</h2>
                <div class="text-center">
                    <a href="{{route('etlap.index')}}" class="btn btn-primary">Összes</a>
                    <a href="{{route('etlap.show', "foetel")}}" class="btn btn-primary">Főételek</a>
                    <a href="{{route('etlap.show', "teszta")}}" class="btn btn-primary">Tészták</a>
                    <a href="{{route('etlap.show', "pizza")}}" class="btn btn-primary">Pizzák</a>
                    <a href="{{route('etlap.show', "hamburger")}}" class="btn btn-primary">Hamburgerek</a>
                    <a href="{{route('etlap.show', "salata")}}" class="btn btn-primary">Saláták</a>
                    <a href="{{route('etlap.show', "desszert")}}" class="btn btn-primary">Desszertek</a>
                    <a href="{{route('etlap.show', "udito")}}" class="btn btn-primary">Üdítők, italok</a>

                    <a href="#" class="btn btn-secondary float-right">Vissza az oldal telejére</a>
                </div>
            </div>

            <?php $i = 4; ?>
            <div class="card-body <?php if ($i % 4 == 0) echo "row"; ?>">
                @forelse($etels as $etel)
                    <form action="{{route('kosar.add')}}" method="POST" class="col-lg-3 col-md-4 col-sm-6">
                        <input type="hidden" value="{{$etel->id}}" id="id" name="etel[]">
                        <input type="hidden" value="{{$etel->nev}}" id="nev" name="etel[]">
                        <input type="hidden" value="{{$etel->ar}}" id="ar" name="etel[]">
                        @csrf
                            <div class="card" style="margin: 10px;">
                            @if($etel->kep)
                                <img src="{{asset('storage/'.$etel->kep)}}" alt="{{$etel->nev}}"
                                     title="{{$etel->nev}}" class="img-fluid etlap_img"/>
                            @else
                                <img src="{{asset('storage/kepek/not_found.png')}}" alt="A kép nem megjeleníthető"
                                     title="A kép nem megjeleníthető" class="img-fluid etlap_img"/>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$etel->nev}}</h5>
                                <p class="card-text">{{$etel->feltetek}}</p>
                                @if($etel->kategoria!="pizza")
                                    <p>{{$etel->ar}} Ft</p>
                                @endif
                                <p>Mennyiség: <input type="number" name="etel[]" value="1" min="1"
                                                     style="width:50px;">
                                </p>
                                @if($etel->kategoria=="pizza")
                                    <div style="display: inline-block; margin: 0; padding: 0;">
                                        <label style="margin: 0; display: table-row;"><input type="radio" id="normal" value="normal" name="etel[]" checked="checked"> Normál (32cm)@if($etel->kategoria=="pizza")<span> {{$etel->ar}} Ft</span>@endif</label>
                                        <label style="margin: 0; display: table-row;"> <input type="radio" id="csaladi" value="csaladi" name="etel[]"> Családi (50cm)@if($etel->kategoria=="pizza")<span> {{$etel->ar*2}} Ft</span>@endif</label>
                                    </div>
                                @endif
                                <div style="display: inline-block;">
                                    <button class="btn btn-success" type="submit">Kosárba</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php $i++; ?>
                @empty
                    <h2>Az ételek nem megjeleníthetőek.</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
