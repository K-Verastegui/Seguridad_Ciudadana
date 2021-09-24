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
      <h3 class="card-title">Reporte de Incidencia <span class="nav-icon fas fa-book"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">

            
            <div class="col-md-12 table-responsive">
            
                <form action="{{route('reporte.store')}}" method="post">
                    @csrf
                    <div style="width: 47%; float: left;">
                        <input type="hidden" class="form-control" value="{{ $incidente_id }}" name="incidencia_id">
                    <br>
                        <label for="description">Descripcion detallada<span class="required">*</span></label>
                        <textarea type="text" id="description" class="form-control" name="description" ></textarea><br>
                        
                        <label for="objetos">Objetos abandonadas por los delincuentes<span class="required">*</span></label>
                        <textarea type="text" id="objetos" class="form-control" name="objetos" ></textarea><br>
                    </div>
                    <div style="width: 47%; float: right;">
                    <br>
                        <label for="aprhendido">Aprhendido(s) <span class="required">*</span></label>
                        <textarea type="aprhendido" id="aprhendido" class="form-control" name="aprhendido"></textarea><br>
                    
                        <label for="seguido">Estado <span class="required">*</span></label>
                        <select name="seguido" id="seguido" class="form-control">
                            <option value="Inactivo">Seleccionar Estado</option>
                            <option value="Frustado">Frustado</option>
                            <option value="Fallido">Fallido</option>
                        </select><br><br>
                    </div>
                    <hr><br>
                    <div style="float: right;">
                    <input type="submit" class="btn btn-success" value="Guardar" style="margin-right: 15px;"> 
                    </div>
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
