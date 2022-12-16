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
                        <h3>150</h3>
                        <p> {{ __('New Orders') }} </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col">2</div>
        </div>
        

    </div>
@stop
