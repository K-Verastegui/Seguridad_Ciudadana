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
      <h3 class="card-title">Lista de Roles <span class="nav-icon fas fa-user-tag"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @include('custom.message')
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              @can('haveaccess','role.create')
                <a href="{{route('role.create')}}" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
              @endcan
            </div>
            <div class="col-md-12 table-responsive">
                <table id="tblRoles" class="table table-hover table-striped" style="width: 100%;">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>SLUG</th>
                      <th>DESCRIPCION</th>
                      <th colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($roles as $rol)
                          <tr>
                              <td>{{$rol->id}}</td>
                              <td>{{$rol->name}}</td>
                              <td>{{$rol->slug}}</td>
                              <td>{{$rol->description}}</td>
                              <td><a class="btn btn-info btn-xs" href="{{route('role.show',$rol->id)}}"> <i class="fa fa-eye"></i></a></td>
                              @can('haveaccess','role.delete')
                              <td><form action="{{route('role.destroy',$rol->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-xs" type="submit"> <i class="fa fa-trash"></i></button>
                                </form>
                              </td>
                              @endcan
                              @can('haveaccess','role.update')
                              <td><a class="btn btn-primary btn-xs" href="{{route('role.edit',$rol->id)}}"> <i class="fa fa-edit"></i></a></td>
                              @endcan
                            </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>SLUG</th>
                      <th>DESCRIPCION</th>
                      <th colspan="3"></th>
                    </tr>
                    </tfoot>
                  </table>

                  {{$roles->links()}}
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
