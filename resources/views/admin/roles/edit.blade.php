@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="h1"> {{ __('Edit') . ' ' . __('Role') }} </h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($role, [
                'autocomplete' => 'off',
                'route' => ['admin.roles.update', $role],
                'method' => 'put',
            ]) !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>

            {!! Form::submit(__('Update'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
