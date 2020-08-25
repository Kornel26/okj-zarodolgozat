@extends('layouts.app')

@section('title', 'Rendelések index')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Rendelések</h2>
            <div class="col-md-5" style="display: inline-block;">
                <form action="{{route('admin.orders.search')}}" method="get">
                    <div class="input-group">
                        <select id="column" name="column">
                            <option value="id">Azonosító</option>
                            <option value="user_id">Felhasználó ID</option>
                            <option value="fizetes_modja">Fizetés módja</option>
                            <option value="megjegyzes">Megjegyzés</option>
                            <option value="allapot">Állapot</option>
                            <option value="fizetendo_osszeg">Fizetendő összeg</option>
                            <option value="rendelo_adatai">Rendelő adatai</option>
                            <option value="created_at">Rendelés ideje</option>
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
            <a class="btn btn-primary" href="{{route('admin.orders.index')}}">Összes lekérése</a>
            <div class="col-md-5" style="display: inline-block;">
                <form action="{{route('admin.orders.search')}}" method="get">
                    <input type="hidden" name="search" value="fuggoben">
                    <input type="hidden" name="column" value="allapot">
                    <input type="hidden" name="type" value="teljes">
                    <button type="submit" class="btn btn-success">Új rendelések</button>
                </form>
            </div>
            <a class="btn btn-primary float-right" href="{{route('admin.')}}">Vissza</a>
        </div>

        <div>
            <table class="table table-striped table-bordered">
                <thead>
                <th>@sortablelink('id', 'Azonosító')</th>
                <th>@sortablelink('user_id', 'Felhasználó ID')</th>
                <th>@sortablelink('fizetes_modja', 'Fizetés módja')</th>
                <th>@sortablelink('megjegyzes', 'Megjegyzés')</th>
                <th>@sortablelink('allapot', 'Állapot')</th>
                <th>@sortablelink('fizetendo_osszeg', 'Fizetendő összeg')</th>
                <th>@sortablelink('rendelo_adatai', 'Rendelő adatai')</th>
                <th>@sortablelink('created_at', 'Rendelés ideje')</th>
                <th>Funkciók</th>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->fizetes_modja}}</td>
                        <td>{{$order->megjegyzes}}</td>
                        <td>{{$order->allapot}}</td>
                        <td>{{$order->fizetendo_osszeg}}</td>
                        <td>{{$order->rendelo_adatai}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            @if($order->allapot == "fuggoben")
                                <a href="{{route('admin.orders.confirm', $order->id)}}">
                                    <button class="btn btn-success float-left" type="button">Megerősítés</button>
                                </a>
                            @endif
                            <a href="{{route('admin.orders.edit', $order->id)}}">
                                <button class="btn btn-warning float-left" type="button">Módosítás</button>
                            </a>
                            @if($order->allapot != "fuggoben")
                                <form action="{{route('admin.orders.destroy', $order)}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger float-left" type="submit">Törlés</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="9"><h1>Nincsenek rendelések az adatbázisban vagy a keresés nem volt megfelelő!</h1></td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
