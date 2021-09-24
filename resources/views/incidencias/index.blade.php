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
                        <th>ENCARGADO</th>
                        <th>ESTADO</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($incidencias as $incidencia)
                          <tr>
                              <td>{{$incidencia->created_at}}</td>
                              <td>{{$incidencia->dni}}</td>

                              <td><span class="badge badge-light right" style="width: 100%">{{$incidencia->categoria}}</span></td>

                              <td>{{$incidencia->longitud}}</td>
                              <td>{{$incidencia->latitud}}</td>
                              <td>
                                <img src="{{$incidencia->foto}}" alt="" width="80px" >
                              </td>
                              <td>{{$incidencia->descripcion}}</td>
                              <td>
                                @foreach( $incidencia->users as $user)
                                <label for="">{{$user->name}}</label><br>
                                @endforeach
                              </td> 
                              
                              <td>
                                    <button type="button" data-toggle="modal" style="width: 100%"
                                    data-target="#editunegocio{{ $incidencia->id }}"
                                    class="badge badge-secondary right">{{$incidencia->seguido}}</button><br>
                              </td>
                              

                                  <div class="modal fade" id="editunegocio{{ $incidencia->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Asignar Encargado
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form id="formeditpro{{ $incidencia->id }}"
                                                action="{{ route('incidencias.update', $incidencia->id) }}" method="POST">
                                                @method('put')
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <label for="user_id">Asignar</label>

                                                        <input type="hidden" value="En camino" class="form-control" name="eseguido">
                                                        <input type="hidden" value="disabled" class="form-control" name="ereadonly">
                                                        
                                                        <select name="user_id" id="user_id" class="form-control">
                                                          @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                          @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">Asignar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
                      <th>ENCARGADO</th>
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
