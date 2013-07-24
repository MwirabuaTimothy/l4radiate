@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')

<h3>Edit Forum</h3>
{{ Form::model($forum, array('method' => 'PATCH', 'route' => array('forums.update', $forum->id))) }}
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
        </li style="list-style: none;">

        <li style="list-style: none;">
            {{ Form::label('posts', 'Posts:') }}
            {{ Form::input('number', 'posts') }}
        </li>

        <li style="list-style: none;">
            {{ Form::label('last_post', 'Last Post:') }}
            {{ Form::text('last_post') }}
        </li>

        <li style="list-style: none;">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('forums.show', 'Cancel', $forum->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop