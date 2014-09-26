@extends('layout')

<div class="container">
@section('content')
    <h1>Login</h1>

    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open('login', 'POST') }}

    {{ Form::hidden('csrf_token', Session::getToken()) }}

    <p>
        {{ Form::label('username', 'Username') }}<br/>
        {{ Form::text('username', Input::old('username')) }}
    </p>

    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password') }}
    </p>

    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
    @stop
</div>