@extends('layouts.scaffold')

@section('main')

<h1>Create Profile</h1>

{{ Form::open(array('route' => 'profiles.store')) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('mobile', 'Mobile:') }}
            {{ Form::text('mobile') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('college', 'College:') }}
            {{ Form::text('college') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>

        <li>
            {{ Form::label('new_pass', 'New_pass:') }}
            {{ Form::text('new_pass') }}
        </li>

        <li>
            {{ Form::label('confirm_pass', 'Confirm_pass:') }}
            {{ Form::text('confirm_pass') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


