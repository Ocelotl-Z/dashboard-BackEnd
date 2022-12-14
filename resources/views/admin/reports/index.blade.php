@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Reportes') }}</h1>
@stop

@section('content')


    <div class="p-3">
        <x-adminlte-info-box title="{{ count($reportes) }}" text="Reportes generados"
            icon="fas fa-lg fa-user-plus text-primary" theme="gradient-primary" icon-theme="white" />

        <x-adminlte-info-box title="{{ __('Complete Reports') }}" text="{{ $completados }}/{{ count($reportes) }}"
            icon="fas fa-lg fa-tasks text-orange" theme="warning" icon-theme="dark" progress=42 progress-theme="dark"
            description="{{ floor(($pendientes * 100) / count($reportes)) }}%" />

        <div >
            <p>Respuesta mas rapida: {{ $res[0] }} min.</p>
            <p>Respuesta mas lenta: {{ $res[1] }} min.</p>
            <p>Promedio : {{ $res[2] }} min.</p>
        </div>

        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div>

@stop



@section('js')
    <script>
        var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                }
            }
        });
    </script>
@stop
