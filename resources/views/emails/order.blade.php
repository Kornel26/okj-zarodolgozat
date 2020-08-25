@component('mail::message')
Kedves {{$orderData[0]}}!

A rendelésed <strong>megerősítettük</strong>!

<h2>Rendelés adatai</h2>

Szállítási cím: {{$orderData[3]}}<br>
Telefonszám: {{$orderData[2]}}<br>
Fizetés módja: {{$order->fizetes_modja}}<br>
Fizetendő összeg: {{$order->fizetendo_osszeg}} HUF

<table>
    <h2>Rendelt ételek</h2>
    <thead>
    <th>Név</th>
    <th>Mennyiség</th>
    </thead>
    <tbody>
    @foreach($tetelek as $tetel)
        <tr>
            <td>{{$etelek[$tetel->etel_id]->nev}}@if($tetel->pizza_meret != null) - {{$tetel->pizza_meret}}@endif</td>
            <td>{{$tetel->mennyiseg}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
Köszönettel,<br>
{{ config('app.name') }}
@endcomponent
