@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Roles') }}</h1>
@stop

@section('content')
    @livewire('admin.roles-index')
@stop
