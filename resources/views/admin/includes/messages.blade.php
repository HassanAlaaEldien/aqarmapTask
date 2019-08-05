@if(session()->has('status') && session()->get('status') === 'success')
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

@foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong> {{ $error }}
    </div>
@endforeach
