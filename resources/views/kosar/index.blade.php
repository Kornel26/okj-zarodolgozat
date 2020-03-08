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
                            <?php $szum += $arr[3] * $arr[2];
                            if(count($arr)==5){
                                if($arr[4] == 'normal')
                                    $tip = "Normál";
                                else
                                    $tip = "Családi";
                            }
                            //dd($arr);
                            ?>
                            <tr>
                                <td>{{$arr[1]}}@if(count($arr)==5) - {{$tip}}@endif</td>
                                <td>{{$arr[2]}} Ft</td>
                                <td>
                                    <form action="{{route('kosar.numDesc')}}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" value="{{$arr[0]}}" name="id">
                                        <button class="btn-primary" type="submit">-</button>
                                    </form>

                                    <input type="number" value="{{$arr[3]}}" min="1" max="999" id="{{$arr[0]}}"
                                           name="{{$arr[0]}}" readonly>

                                    <form action="{{route('kosar.numInc')}}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" value="{{$arr[0]}}" name="id">
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

                <div class="d-inline-block float-right">
                    Kosár összesen: <strong>{{$szum}} Ft</strong>
                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
@endsection
