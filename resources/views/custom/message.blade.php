@if(session('status_success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{session('status_success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    <ul>
        @foreach ($errors->all() as $e)
        <li>{{$e}}</li>
        @endforeach
    </ul>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('status_error'))
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    {{session('status_error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif