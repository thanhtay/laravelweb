@extends('backend::layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>Create Administrator</h2>
        </div>
    </div>
    {{ Form::open(['method' => 'POST']) }}
    <div class="row">
        <div class="col-6">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full name']) }}
        </div>
        <div class="col-6">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
        </div>
        <div class="w-100 mt-3"></div>
        <div class="col-6">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
        <div class="col-6">
        </div>
        <div class="w-100 mt-3"></div>
        <div class="col justify-content-center">
            {{ Form::button('Submit', ['type' => 'submit']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@endsection
