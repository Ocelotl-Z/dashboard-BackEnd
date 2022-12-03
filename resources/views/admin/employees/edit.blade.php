@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="h1"> {{ __('Edit') . ' ' . __('Employee') }} </h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($employee, [
                'autocomplete' => 'off',
                'route' => ['admin.employees.update', $employee],
                'method' => 'put',
            ]) !!}

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

            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                {!! Form::label('roles', 'Roles') !!}
                {!! Form::select('roles', $roles, null, ['id' => 'roles', 'class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('roles') }}</small>
            </div>

            {{-- <p class="h5">{{ __('List of roles') }}</p>
            @foreach ($roles as $role)
                <div class="form-check">
                    {{ Form::radio('role', $role->id, $employee->hasRole($role->name), ['class' => 'mr-1']) }}
                    {{ Form::label('role', $role->name) }}
                </div>
            @endforeach --}}

            {!! Form::submit(__('Update'), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
