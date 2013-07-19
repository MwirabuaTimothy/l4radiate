@extends('layouts.scaffold')

@section('main')

<h1>Create College</h1>

{{ Form::open(array('route' => 'colleges.store')) }}
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


@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/colleges-create.css')}} ">
 
@stop


