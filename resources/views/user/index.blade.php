@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
    @endsection
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
      <h3 class="card-title">Lista de Personal <span class="nav-icon fas fa-users"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @include('custom.message')
        <div class="row">
        <div class="col-md-12" style="margin-bottom: 5px;">
              @can('haveaccess','user.create')
                <a href="{{route('user.create')}}" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
                @endcan
            </div>
            <div class="col-md-12 table-responsive">
                <table id="tblusers" class="table table-hover table-striped" style="width: 100%;">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>DNI</th>
                      <th>CELULAR</th>
                      <th>EMAIL</th>
                      <th>ROLES(S)</th>
                      <th>ESTADO</th>
                      <th colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->dni}}</td>
                              <td>{{$user->celular}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                @isset($user->roles[0]->name)
                                  {{$user->roles[0]->name}}
                                @endisset
                              </td>
                              <td>{{$user->estado}}</td>
                              <td><a class="btn btn-info btn-xs" href="{{route('user.show',$user->id)}}"> <i class="fa fa-eye"></i></a></td>
                              @can('haveaccess','user.delete')
                              <td><form action="{{route('user.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-xs" type="submit"> <i class="fa fa-trash"></i></button>
                                </form>
                              </td>
                              @endcan
                              @can('haveaccess','user.update')
                              <td><a class="btn btn-primary btn-xs" href="{{route('user.edit',$user->id)}}"> <i class="fa fa-edit"></i></a></td>
                              @endcan
                            </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>DNI</th>
                      <th>CELULAR</th>
                      <th>EMAIL</th>
                      <th>ROLES(S)</th>
                      <th>ESTADO</th>
                      <th colspan="3"></th>
                    </tr>
                    </tfoot>
                  </table>

                  {{$users->links()}}
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
