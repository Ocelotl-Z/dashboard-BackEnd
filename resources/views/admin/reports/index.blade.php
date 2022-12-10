@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Reportes') }}</h1>
@stop

@section('content')


    <x-adminlte-info-box title="{{ count($reportes) }}" text="Reportes generados" icon="fas fa-lg fa-user-plus text-primary"
        theme="gradient-primary" icon-theme="white" />

    <x-adminlte-info-box title="{{ 'Complete Reports' }}" text="{{ $completados }}/{{ count($reportes) }}"
        icon="fas fa-lg fa-tasks text-orange" theme="warning" icon-theme="dark" progress=97 progress-theme="dark"
        description="{{ floor(($pendientes * 100) / count($reportes)) }}%" />

@stop
