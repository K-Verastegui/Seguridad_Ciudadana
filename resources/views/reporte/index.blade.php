@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
@endsection
@section('item11100')
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
      <h3 class="card-title">Lista de Reportes <span class="nav-icon far fa-folder"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <!-- <div class="col-md-12" style="margin-bottom: 5px;">
                <a href="{{route('user.create')}}" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>
            </div> -->
            <div class="col-md-12 table-responsive">
                <table id="table_id" class="table table-hover table-striped" style="width: 100%;">
                    <thead>
                    <tr>
                      <th>FECHA</th>
                      <th>REPORTANTE</th>
                      <th>TIPO</th>
                      <th>REPORTE</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($incidencias as $incidencia)
                          <tr>
                              <td>{{$incidencia->created_at}}</td>
                              <td>{{$incidencia->dni}}</td>
                              <td>{{$incidencia->categoria}}</td>                                                  
                              
                              <td>
                                <a class="btn btn-info btn-xs" href="{{route('reporte.show',$incidencia->id)}}"> <i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" href="{{route('reporte.edit',$incidencia->id)}}"> <i class="fa fa-edit"></i></a></td>
                              </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>FECHA</th>
                      <th>REPORTANTE</th>
                      <th>TIPO</th>
                      <th>REPORTE</th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
@section('script')
<script>
    $('#table_id').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });    
</script>
@endsection
