@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Monitor de Red Cruz Verde</h1>
@stop

@section('content')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Estado de las sucursales en tiempo real</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
      <div class="col-sm-6">
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Bar Chart</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-sm-12">
        <!-- Offices List -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Listado de sucursales</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            @if (count($sucursales))
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">IP</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col" class="text-center">Estado</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sucursales as $sucursal)
                    <tr>
                      <th scope="row">{{ $sucursal->ocode }} </th>
                      <td> {{ $sucursal->oname }}</td>
                      <td>{{ $sucursal->oip }} </td>
                      <td>{{ implode(', ', $sucursal->Providers()->get()->pluck('pname')->toArray()) }} </td>
                        <td class="text-center">
                          <i class="fas fa-fw fa-circle text-green"></i>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <div class="text-body">Sin Información</div>
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            /* ChartJS
            * -------
            * Here we will create a few charts using ChartJS
            */
           //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
            labels: [
                'Activo',
                'Inactivo',
                'Alerta'
            ],
            datasets: [
                {
                data: [700,500,200],
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
            }
            var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
            })

            var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                label               : 'Digital Goods',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
                },
                // {
                // label               : 'Electronics',
                // backgroundColor     : 'rgba(210, 214, 222, 1)',
                // borderColor         : 'rgba(210, 214, 222, 1)',
                // pointRadius         : false,
                // pointColor          : 'rgba(210, 214, 222, 1)',
                // pointStrokeColor    : '#c1c7d1',
                // pointHighlightFill  : '#fff',
                // pointHighlightStroke: 'rgba(220,220,220,1)',
                // data                : [65, 59, 80, 81, 56, 55, 40]
                // },
            ]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            //var temp1 = areaChartData.datasets[1]
            //barChartData.datasets[0] = temp1
           // barChartData.datasets[0] = temp0

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
            })




        })
    </script>
@stop
