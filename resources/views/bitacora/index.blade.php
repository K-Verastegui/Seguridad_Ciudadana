@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
@endsection
@section('item5')
active
@stop

@section('contenido')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bitácora del Sistema <span class="nav-icon fas fa-database"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <table id="table_id" class="table table-hover table-striped" style="width: 100%;">
            <thead>
            <tr>
                <th>FECHA</th>
                <th>EQUIPO</th>
                <th>USUARIO</th>
                <th>TRANSACCION</th>
                <th>TABLA</th>
            </tr>
            </thead>
            <tbody>
              @foreach($bitacoras as $bitacora)
                <tr>
                  <td>{{$bitacora->created_at}}</td>
                  <td>{{$bitacora->equipo}}</td>
                  <td>{{$bitacora->user}}</td>
                  <td>{{$bitacora->descripcion}}</td>
                  <td>{{$bitacora->tabla}}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>FECHA</th>
                <th>EQUIPO</th>
                <th>USUARIO</th>
                <th>TRANSACCION</th>
                <th>TABLA</th>
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
