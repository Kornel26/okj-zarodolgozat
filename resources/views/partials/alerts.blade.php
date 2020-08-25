@if(session('success'))
    <div class="alert alert-success" role="alert">
        <h2>{{session('success')}}</h2>
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger" role="alert">
        <h2>{{session('danger')}}</h2>
    </div>
@endif
