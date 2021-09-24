@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
@endsection
@section('item11')
menu-open
@stop
@section('item111')
active
@stop
@section('item1111')
active
@stop
@section('contenido')
<style>
   
    .btn-circle {
        width: 80px;
        height: 33px;
        padding: 6px 0px;
        border-radius: 15px;
        text-align: center;
        font-size: 15px;
        line-height: 1.42857;
    }
</style>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Vista de Personal <span class="nav-icon fas fa-users"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name',$user->name)}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{old('dni',$user->dni)}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="celular" placeholder="Celular" value="{{old('celular',$user->celular)}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email',$user->email)}}" readonly>
                    </div>
                    <div class="form-group">
                        <select name="role_id" class="form-control" disabled>
                            @foreach ($roles as $rol)
                                <option value="{{$rol->id}}"
                                    @isset($user->roles[0]->name)
                                        @if($user->roles[0]->name == $rol->name)
                                            selected
                                        @endif
                                    @endisset>{{$rol->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="estado" placeholder="Estado" value="{{old('estado',$user->estado)}}" readonly>
                    </div>
                    <hr>
                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-success">Editar</a>  
                    <a href="{{route('user.index')}}" class="btn btn-danger">Volver</a>
                </form>

                
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('script')
<script>
</script>
@endsection
