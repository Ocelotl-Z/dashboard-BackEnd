@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Help Desk') }}</h1>
@stop

@section('content')


    <div class="p-3">

        <div class="row">
            <div class="col">
                <x-adminlte-info-box title="{{ __('Complete Reports') }}" text="{{ $completados }}/{{ count($reportes) }}"
                    icon="fas fa-lg fa-tasks text-orange" theme="warning" icon-theme="dark" progress=42 progress-theme="dark"
                    description="{{ floor(($completados * 100) / count($reportes)) }}%" />
            </div>
            <div class="col">
                <x-adminlte-info-box title="{{ __('Pending Reports') }}" text="{{ $pendientes }}/{{ count($reportes) }}"
                    icon="fas fa-lg fa-tasks text-orange" theme="warning" icon-theme="dark" progress=42
                    progress-theme="dark" description="{{ floor(($pendientes * 100) / count($reportes)) }}%" />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-tachometer-alt"></i></span>
                    <div class="info-box-content">
                        <span>Respuesta mas rapida: {{ $res[0] }}</span>
                        <span>Respuesta mas lenta: {{ $res[1] }}</span>
                        <span>Promedio : {{ $res[2] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center">
            <h3>Solicitudes por dia</h3>
            <canvas id="diasConReporte" style="width:100%;max-width:800px;"></canvas>
        </div>
    </div>

@stop



@section('js')
    <script>
        const Days = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado',
        ];



        const data = {
            labels: Days,
            datasets: [{
                label: 'Tickets Dicimebre',
                data: JSON.parse("{{ json_encode($grafica) }}"),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        new Chart("diasConReporte", {
            type: "bar",
            data: data,
            options: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });
    </script>
@stop
