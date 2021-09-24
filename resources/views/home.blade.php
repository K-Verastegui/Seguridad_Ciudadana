@extends('layouts.index')
@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/icon" href="/img/ico.ico">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @endsection
@section('item1299')
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
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$robos}}</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            ROBOS AL PASO</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$violaciones}}</div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            VIOLACIONES</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$traficos}}</div>
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            TRAFICO DE DROGAS</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$asesinatos}}</div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            ASESINATOS</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pandillajes}}</div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            PANDILLAJE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$otros}}</div>
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            OTRO TIPO</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div id="piechart" style="width: 50%; height: 410px;"></div>
    <div id="chart_div" style="width: 50%; height: 410px;"></div>
</div>
@endsection
@section('script')
<script>
    google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['ROBOS AL PASO', {{$robos}}],
          ['VIOLACIONES', {{$violaciones}}],
          ['TRAFICO DROGAS', {{$traficos}}],
          ['ASESINATOS', {{$asesinatos}}],
          ['PANDILLAJE', {{$pandillajes}}],
          ['OTRO TIPO', {{$pandillajes}}]
        ]);

        var options = {
          title: 'Categorias de Incidencias'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }   

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawStacked);

    function drawStacked() {
        var data = google.visualization.arrayToDataTable([
            ['Element', '', { role: 'style' }],
            ['FRUSTRADO', {{$frustado}}, '#b87333'],
            ['FALLIDO', {{$fallido}}, 'silver']
        ]);

        var options = {
            title: 'Estado de Incidencias',
            chartArea: {width: '50%'},
            isStacked: true,
            hAxis: {
            title: 'Total',
            minValue: 0,
            },
            vAxis: {
            title: 'Estado'
            }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
@endsection
