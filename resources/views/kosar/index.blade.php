@extends('layouts.app')

@section('title', 'Kosár')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="display: inline-block;">Kosár</h2>
                <form action="{{route('kosar.empty')}}" method="post" class="float-right d-inline-block">@csrf
                    <button type="submit" class="btn btn-danger" style="color: white;">Kosár kiürítése</button>
                </form>
            </div>
            <form action="{{route('rendeles.add')}}" method="post">
                @csrf
                <div class="card-body">
                    <?php
                    //session()->flush();
                    //dd(session()->get('kosar'));
                    $array = session()->get('kosar');
                    $szum = 0;
                    ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Név</th>
                        <th>Ár</th>
                        <th>Mennyiség</th>
                        <th>Összesen</th>
                        <th style="width: 1%;">Eltávolítás</th>
                        </thead>
                        <tbody>
                        @if($array != null)
                            @foreach($array as $arr)
                                <?php
                                if (count($arr) == 5) {
                                    if ($arr[4] == 'normal')
                                        $tip = "Normál";
                                    else {
                                        $tip = "Családi";
                                        $arr[2] *= 2;
                                    }
                                }
                                $szum += $arr[3] * $arr[2];
                                //dd($arr);
                                ?>
                                <tr>
                                    <td>{{$arr[1]}}@if(count($arr)==5) - {{$tip}}@endif</td>
                                    <td>{{$arr[2]}} Ft</td>
                                    <td>
                                        <form></form>
                                        <form action="{{route('kosar.numDesc')}}" method="post" class="d-inline-block" id="numDesc">
                                            @csrf
                                            <input type="hidden" value="{{$arr[0]}}" name="id" id="idDesc">
                                            <button class="btn-primary" type="submit">-</button>
                                        </form>

                                        <input type="number" value="{{$arr[3]}}" min="1" max="999" id="{{$arr[0]}}"
                                               name="etelek[{{$arr[0]}}]" readonly>

                                        <form action="{{route('kosar.numInc')}}" method="post" class="d-inline-block" id="numInc">
                                            @csrf
                                            <input type="hidden" value="{{$arr[0]}}" name="id" id="idInc">
                                            <button class="btn-primary" type="submit">+</button>
                                        </form>

                                    </td>
                                    <td>{{$arr[3]*$arr[2]}} Ft</td>
                                    <td class="text-center">
                                        <form action="{{route('kosar.delete')}}" method="post">
                                            <input type="hidden" name="id" value="{{$arr[0]}}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">X</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        @else
                            <tr>
                                <td><h2>A kosarad üres.</h2></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    <div class="text-right">
                        Kosár összesen: <strong>{{$szum}} Ft</strong>
                    </div>

                    @if(session()->has('kosar'))
                        <input type="hidden" id="user_id" name="user_id" value="@if($user!=null){{$user->id}}@endif">
                        <input type="hidden" id="fizetendo_osszeg" name="fizetendo_osszeg" value="{{$szum}}">
                            <div>
                                <div class="form-group row">
                                    <label for="nev" class="col-md-2 col-form-label"><strong>Név</strong></label>
                                    <input id="nev" type="text" class="form-control col-md-4" name="nev"
                                           value="@if($user!=null){{$user->vezeteknev}} {{$user->keresztnev}}@endif" required>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label"><strong>E-Mail</strong></label>
                                    <input id="email" type="text" class="form-control col-md-4" name="email"
                                           value="@if($user!=null){{$user->email}}@endif" required>
                                </div>
                                <div class="form-group row">
                                    <label for="telefonszam"
                                           class="col-md-2 col-form-label"><strong>Telefonszám</strong></label>
                                    <input id="telefonszam" type="text" class="form-control col-md-4" name="telefonszam"
                                           value="@if($user!=null){{$user->telefonszam}}@endif" required>
                                </div>
                                <div class="form-group row">
                                    <label for="cim" class="col-md-6 col-form-label"><strong>Cím</strong> (irányítószám,
                                        település,
                                        utca, házszám, emelet, ajtó kapucsengő)</label>
                                </div>
                                <input id="cim" type="text" class="form-control col-md-6" name="cim"
                                       value="@if($user!=null){{$user->iranyitoszam}} {{$user->telepules}} {{$user->utca}} {{$user->hazszam}} {{$user->egyeb}}@endif"
                                       required>
                                <div class="form-group row">
                                    <label for="fizetes" class="col-md-2 col-form-label"><strong>Fizetés módja</strong></label>
                                    <label style="margin-right: 10px;"><input style="margin-top: 15px;" id="keszpenz" value="keszpenz" type="radio"
                                                                              name="fizetes" checked> Készpénz</label>
                                    <label><input style="margin-top: 15px;" id="bankkartya" value="bankkartya" type="radio" name="fizetes">
                                        Bankkártya</label>
                                </div>
                                <div class="form-group row">
                                    <label for="megjegyzes" class="col-md-2 col-form-label"><strong>Megjegyzés</strong></label>
                                    <textarea id="megjegyzes" type="text" class="col-md-4" name="megjegyzes"
                                              rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Rendelés</button>
                            </div>
                        @endif
                </div>
            </form>
        </div>
    </div>
@endsection
