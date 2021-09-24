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
      <h3 class="card-title">Agregar Nuevo Personal <span class="nav-icon fas fa-users"></span></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div style="width: 47%; float: left;">
                    <br>
                        <label for="name">Nombre y Apellidos <span class="required">*</span></label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" required><br>
                    
                        <label for="dni">Documento de Identidad <span class="required">*</span></label>
                        <input type="dni" id="dni" class="form-control" name="dni" placeholder="DNI" required><br>
                    
                        <label for="celular">Telefono o Celular <span class="required">*</span></label>
                        <input type="celular" id="celular" class="form-control" name="celular" placeholder="Celular" required><br>
                    </div>
                    <div style="width: 47%; float: right;">
                    <br>
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" required><br>
                    
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required><br>
                    
                        <label for="estado">Estado <span class="required">*</span></label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="Inactivo">Seleccionar Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select><br>
                    </div>
                    <hr><br>
                    <div style="float: right;">
                    <input type="submit" class="btn btn-success" value="Guardar" style="margin-right: 15px;"> 
                    <a href="{{route('user.index')}}" class="btn btn-danger">Volver al listado</a>  
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
    <script src="lumino/js/jquery-1.11.1.min.js"></script>
	<script src="lumino/js/bootstrap.min.js"></script>
	<script src="lumino/js/chart.min.js"></script>
	<script src="lumino/js/chart-data.js"></script>
	<script src="lumino/js/easypiechart.js"></script>
	<script src="lumino/js/easypiechart-data.js"></script>
	<script src="lumino/js/bootstrap-datepicker.js"></script>
	<script src="lumino/js/custom.js"></script>
</script>
@endsection
