@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')

<h3>Create Forum</h3>

{{ Form::open(array('route' => 'forums.store')) }}
    <ul>
        <li style="list-style: none;">
            {{ Form::label('forum_title', 'Forum Title:') }}
            {{ Form::text('forum_title') }}
        </li>

        <li style="list-style: none;">
            {{ Form::label('forum_description', 'Forum Description:') }}
            {{ Form::textarea('forum_description') }}
        </li>

        <li style="list-style: none;">
            {{ Form::label('topics', 'Topics:') }}
            {{ Form::input('number', 'topics') }}
        </li>

        <li style="list-style: none;">
            {{ Form::label('posts', 'Posts:') }}
            {{ Form::input('number', 'posts') }}
        </li>

        <li style="list-style: none;">
            {{ Form::label('last_post', 'Last Post:') }}
            {{ Form::text('last_post') }}
        </li>

        <li style="list-style: none;">
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

 <link rel="stylesheet" href="{{ asset('assets/styles/css/forums-create.css')}} ">
 
@stop
