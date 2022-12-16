@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Inventory') }}</h1>
@stop

@section('content')
    <div class="p-3">

        <div class="row">
            <div class="col">
                <x-adminlte-info-box title="Productos Registrados" text="{{ count($productos) }}"
                    icon="fas fa-lg fa-parachute-box" icon-theme="purple" />
            </div>
            <div class="col">
                <x-adminlte-info-box title="Productos totales en bodega" text="{{ $total_items }}"
                    icon="fas fa-lg  fa-truck-loading" icon-theme="purple" />
            </div>
        </div>

        <div class="row">
            <div class="col align-self-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" {{ $reporte[0]->thumbnail }} " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $reporte[0]->title }}</h5>
                        <p class="card-text">Producto con mayor stock</p>
                        <p>{{ $reporte[0]->stock }} pz</p>
                    </div>
                </div>
            </div>
            <div class="col align-self-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" {{ $reporte[1]->thumbnail }} " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $reporte[1]->title }}</h5>
                        <p class="card-text">Producto con menor stock</p>
                        <p>{{ $reporte[1]->stock }} pz</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col align-self-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" {{ $rating[0]->thumbnail }} " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $rating[0]->title }}</h5>
                        <p class="card-text">Producto con mayor rating</p>
                        <p>{{ $rating[0]->rating }} pz</p>
                    </div>
                </div>
            </div>
            <div class="col align-self-center">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=" {{ $rating[1]->thumbnail }} " alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $rating[1]->title }}</h5>
                        <p class="card-text">Producto con menor rating</p>
                        <p>{{ $reporte[1]->rating }} pz</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
