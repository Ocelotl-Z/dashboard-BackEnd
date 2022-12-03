@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Company') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {{ Form::model($company, [
                'autocomplete' => 'off',
                'files' => true,
                'route' => ['admin.companies.update', $company],
                'method' => 'put',
            ]) }}

            <div class="d-flex flex-column align-items-center justify-content-around gap-3">
                <div>
                    <img id="frame"
                        src="{{ $company->logo_path ? Storage::url($company->logo_path) : secure_asset('./images/logo.png') }}"
                        class="image-fluid rounded-circle company-shadow" style="width: 150px; height: 150px;" />
                </div>
                <div class="mt-2">
                    {{ Form::label('logo', __('Change Logo'), ['class' => 'btn btn-primary mt-2']) }}
                    {{ Form::file('logo', ['class' => 'd-none']) }}
                </div>
            </div>

            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('name', __('Company Name')) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>


            {{ Form::submit(__('Update'), ['class' => 'btn btn-success']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
@section('js')
    <script>
        const types = ["image/png", "image/gif", "image/jpeg"]

        document.getElementById("logo").addEventListener('change', preview);

        function preview(event) {
            if (types.includes(event.target.files[0].type)) {
                frame.src = URL.createObjectURL(event.target.files[0]);
            } else {

                alert("Tipo no admitido");
            }
        }
    </script>
@stop
