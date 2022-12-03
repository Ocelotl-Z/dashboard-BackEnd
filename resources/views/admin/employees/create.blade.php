@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="h1"> {{ __('New employee') }} </h1>

@stop

@section('content')

    <div class="p-3">
        <div class="card">
            <div class="card-body">

                {{-- {!! Form::model($employee, [
                    'autocomplete' => 'off',
                    'route' => ['admin.employees.update', $employee],
                    'method' => 'put',
                ]) !!} --}}

                {!! Form::open(['autocomplete' => 'off', 'method' => 'POST', 'route' => 'admin.employees.store']) !!}


                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', __('Name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>


                <div class="form-group{{ $errors->has('paternal_surname') ? ' has-error' : '' }}">
                    {!! Form::label('paternal_surname', __('Paternal Surname')) !!}
                    {!! Form::text('paternal_surname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('paternal_surname') }}</small>
                </div>

                <div class="form-group{{ $errors->has('maternal_surname') ? ' has-error' : '' }}">
                    {!! Form::label('maternal_surname', __('Maternal Surname')) !!}
                    {!! Form::text('maternal_surname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('maternal_surname') }}</small>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', __('E-Mail Address')) !!}
                    {!! Form::email('email', null, [
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => 'foo@bar.com',
                    ]) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', __('Password')) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                    {!! Form::label('roles', 'Roles') !!}
                    {!! Form::select('roles', $roles, null, ['id' => 'roles', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('roles') }}</small>
                </div>


                {!! Form::submit(__('Register'), ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
