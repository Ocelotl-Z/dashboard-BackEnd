@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Employees') }}</h1>
@stop

@section('content')
    @livewire('admin.employees-index')
@stop
