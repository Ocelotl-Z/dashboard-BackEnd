@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control"> {{ $user->full_name }} </p>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

            <p class="h5">Listado de roles</p>
            @foreach ($roles as $role)
                <div class="form-check">
                    {{ Form::radio('role', $role->id, Auth::user()->hasRole($role->name), ['class' => 'mr-1']) }}
                    {{ Form::label('role', $role->name) }}
                </div>
            @endforeach

            {!! Form::submit(__('Assign role'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
