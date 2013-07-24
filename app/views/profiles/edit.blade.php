@extends('layouts.scaffold')

@section('main')

<h1>Edit Profile</h1>
{{ Form::model($profile, array('method' => 'PATCH', 'route' => array('profiles.update', $profile->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('profiles.show', 'Cancel', $profile->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop