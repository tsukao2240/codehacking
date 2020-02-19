@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>
    {{ Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true]) }}

    <div class="form-group">
        {{ Form::label('name','Name') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email','Email') }}
        {{ Form::email('email',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('role_id','Role') }}
        {{ Form::select('role_id',[''=>'Choose Option']+$roles,null,['class'=>'form-control'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('is_active','Status') }}
        {{ Form::select('is_active',[1 => 'Active',0 => 'Not Active'],null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('file','File') }}
        {{ Form::file('file',null,['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('password','Password') }}
        {{ Form::password('password',['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Create User',['class'=>'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
    @include('includes.form_error')

@endsection
