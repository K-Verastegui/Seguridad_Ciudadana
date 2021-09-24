@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
@endsection
@section('item1117')
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
      <h3 class="card-title">Lista de Incidentes <span class="nav-icon fas fa-users"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @include('custom.message')
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table id="table_id" class="table table-hover table-striped" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>REPORTANTE</th>
                        <th>TIPO</th>
                        <th>LONGITUD</th>
                        <th>LATITUD</th>
                        <th>EVIDENCIA</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($incidencias as $incidencia)
                          <tr>
                            <td>{{$incidencia->created_at}}</td>
                            <td>{{$incidencia->dni}}</td>
                            
                            <td><span class="badge badge-primary right" style="width: 100%">{{$incidencia->categoria}}</span></td>

                            <td>{{$incidencia->longitud}}</td>
                            <td>{{$incidencia->latitud}}</td>
                            <td>
                              <img src="{{$incidencia->foto}}" alt="" width="80px" >
                            </td>
                            
                            <td>{{$incidencia->descripcion}}</td>
                            <td>
                                <button style="width: 100%" onclick="window.location.href='{{ route('incidentes.show', $incidencia->id) }}'" class="badge badge-secondary right" {{$incidencia->estado}}>Reporte</button>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>FECHA</th>
                      <th>REPORTANTE</th>
                      <th>TIPO</th>
                      <th>LONGITUD</th>
                      <th>LATITUD</th>
                      <th>EVIDENCIA</th>
                      <th>DESCRIPCION</th>
                      <th>ESTADO</th>
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
