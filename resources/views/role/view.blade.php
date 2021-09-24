@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
@endsection
@section('item1112')
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
      <h3 class="card-title">Vista de Rol <span class="nav-icon fas fa-user-tag"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('role.update',$role->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name',$role->name)}}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{old('slug',$role->slug)}}" readonly>
                    </div>
                    <div class="form-group">
                        <textarea name="description" cols="30" rows="2" placeholder="Description" class="form-control" readonly>{{old('description',$role->description)}}</textarea>
                    </div>
                    <hr>
                    <h3>Permission List</h3>
                    @foreach ($permissions as $perm)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="permission_{{$perm->id}}" name="permission[]" class="custom-control-input" value="{{$perm->id}}"
                        @if(is_array($permission_role) && in_array("$perm->id",$permission_role))
                        checked
                        @elseif(is_array(old('permission')) && in_array("$perm->id",old('permission')))
                        checked
                        @endif disabled>
                        <label class="custom-control-label" for="permission_{{$perm->id}}">
                            {{$perm->id}}-{{$perm->name}}-<em>({{$perm->description}})</em>
                        </label>
                    </div> 
                    @endforeach  
                    <hr>
                    <a href="{{route('role.edit',$role->id)}}" class="btn btn-success">Editar</a>  
                    <a href="{{route('role.index')}}" class="btn btn-danger">Volver</a>
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
