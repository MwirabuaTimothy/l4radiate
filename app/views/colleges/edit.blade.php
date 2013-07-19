@extends('layouts.scaffold')

@section('main')

<h1>Edit College</h1>
{{ Form::model($college, array('method' => 'PATCH', 'route' => array('colleges.update', $college->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::textarea('name') }}
        </li>

        <li>
            {{ Form::label('university', 'University:') }}
            {{ Form::text('university') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('colleges.show', 'Cancel', $college->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop