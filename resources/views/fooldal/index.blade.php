@extends('layouts/app')

@section('title', 'Főoldal')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text">
                    <div class="vertical">
                        <h1>Üdvözöllek</h1>
                        <p>In blandit id sapien quis blandit. Curabitur eleifend mi in elit feugiat facilisis. Nam ante
                            nibh, ultricies eu nisl non, bibendum tincidunt libero. Nunc augue lorem, lacinia gravida
                            nisl
                            vitae, congue auctor sapien. Mauris rutrum libero vel commodo sodales. Curabitur lacinia
                            dapibus
                            hendrerit. Nam consectetur odio sit amet vulputate ultrices. Integer ullamcorper tempus leo.
                            Integer tincidunt accumsan tellus, ut vehicula tortor congue id. Fusce viverra ultricies
                            sapien
                            in pulvinar. Nullam elit elit, accumsan sed aliquet nec, vehicula quis quam. Maecenas ut
                            erat
                            orci.</p>
                    </div>
                </div>
                <div class="parallax"
                     style=" background-image: url('{{asset('storage/hatterkepek/fireplace-1082342.jpg')}}');"></div>
                <div class="text">
                    <div class="vertical">
                        <h1>Rólunk</h1>
                        <p>In blandit id sapien quis blandit. Curabitur eleifend mi in elit feugiat facilisis. Nam ante
                            nibh,
                            ultricies eu nisl non, bibendum tincidunt libero. Nunc augue lorem, lacinia gravida nisl
                            vitae,
                            congue auctor sapien. Mauris rutrum libero vel commodo sodales. Curabitur lacinia dapibus
                            hendrerit.
                            Nam consectetur odio sit amet vulputate ultrices. Integer ullamcorper tempus leo. Integer
                            tincidunt
                            accumsan tellus, ut vehicula tortor congue id. Fusce viverra ultricies sapien in pulvinar.
                            Nullam
                            elit elit, accumsan sed aliquet nec, vehicula quis quam. Maecenas ut erat orci.</p>
                    </div>
                </div>
                <div class="parallax" style=" background-image: url('{{asset('storage/hatterkepek/burger.jpg')}}');"></div>
            </div>
        </div>
    </div>
@endsection
