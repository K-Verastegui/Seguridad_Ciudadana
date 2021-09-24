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
      <h3 class="card-title">Reporte de Incidencia <span class="nav-icon far fa-folder"></span>
      <a href="{{route('reporte.index')}}" class="btn btn-danger btn-xs" style="float: right">
        <i class="fas fa-times"></i>
      </a></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="table_id" class="table table-bordered" style="width: 100%;text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" colspan="3"><img src="/img/escudo.jpg" style="height: 100px;"></th>
                    <th colspan="3">SISTEMA DE GESTION DE SEGURIDAD CIUDADANA</th>
                </tr>
                <tr>
                    <th colspan="3">SG-CIUDADANA</th>
                </tr>
                <tr>
                    <th colspan="6">REPORTE DE INCIDENTE</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:#C2C8CE;color:#ffffff;">Nº Evento:</td>
                        <td> {{$incidencia_id}}</td>
                        <td style="background-color:#C2C8CE;color:#ffffff;">Ubicación:</td>
                        <td>Longitud: {{$longitud}} - Latitud: {{$latitud}}</td>
                        <td style="background-color:#C2C8CE;color:#ffffff;">Estado:</td>
                        <td> {{$estado}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="background-color:#ffffff;color:#ffffff;"></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="background-color:#C2C8CE;color:#ffffff;">INFORMACIÓN GENERAL</td>
                    </tr>

                    <tr>
                        <td colspan="6" style="text-align:left;">
                            @foreach ($incidencias as $incidencia)
                            <div style="width: 40%; float: left; margin-left: 30px">
                            <br>
                            <div class="form-group">
                                <label for="dni">Reportante <span class="required">:</span></label>
                                <label for="dni">{{$nombre}}</label>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria <span class="required">:</span></label>
                                <label for="dni">{{$incidencia->categoria}}</label>
                            </div>
                            </div>
                            <div style="width: 40%; float: right;margin-right: 30px">
                            <br>
                            <div class="form-group">
                                <label for="seguido">Estado <span class="required">:</span></label>
                                <label for="dni">{{$incidencia->seguido}}</label>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Fecha <span class="required">:</span></label>
                                <label for="dni">{{$incidencia->created_at}}</label>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="background-color:#C2C8CE;color:#ffffff;">DETALLES DEL INCIDENTE</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:left;">
                            
                            <div style="width: 40%; float: left; margin-left: 30px">
                            <br>
                                @foreach ($incidencias as $incidencia)
                                    @foreach( $incidencia->users as $user)
                                        <div class="form-group">
                                            <label for="dni">Reportante <span class="required">:</span></label>   
                                            <label for="dni">{{$user->name}}</label>
                                        </div>   
                                        <div class="form-group">
                                            <label for="categoria">DNI <span class="required">:</span></label>
                                            <label for="dni">{{$user->dni}}</label>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            @foreach ($reportes as $reporte)
                            <div style="width: 40%; float: right;margin-right: 30px">
                            <br>
                            <div class="form-group">
                                <label for="seguido">Aprhendido(s) <span class="required">:</span></label>
                                <label for="dni">{{$reporte->aprhendido}}</label>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Objetos(s) <span class="required">:</span></label>
                                <label for="dni">{{$reporte->objetos}}</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="background-color:#C2C8CE;color:#ffffff;">DESCRIPCIÓN CLARA DEL INCIDENTE</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:left;">
                            <div class="form-group" style="margin-left: 30px;margin-right: 30px">
                                <label for="dni">{{$reporte->description}}</label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    <!-- /.card-body -->
</div>
@endsection
@section('script')
<script>
</script>
@endsection
