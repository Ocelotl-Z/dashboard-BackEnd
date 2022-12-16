@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Sales') }}</h1>
@stop

@section('content')
    <div class="p-3">

        <div class="row">
            <div class="col">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($ventas) }}</h3>
                        <p> Total de ventas </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>$ {{ $ventaMayor->total }}</h3>
                        <p> Venta mayor </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Productos mas vendidos</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($prodMax as $item)
                            <li class="list-group-item">{{ $item->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $prodsVendidos }} pz.</h3>
                        <p> Total de productos vendidos </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
