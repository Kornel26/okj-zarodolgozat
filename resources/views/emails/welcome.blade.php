@component('mail::message')
Kedves, <strong>{{$user->keresztnev}}</strong>!

Köszönjük a regisztrációd!

@component('mail::button', ['url' => 'http://127.0.0.1:8000/etlap', 'color' => 'success'])
    Ugrás az étlapra!
@endcomponent

Köszönettel,<br>
{{ config('app.name') }}
@endcomponent
