@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')
<!-- replace the content below to suit your page then save with a different name -->

    <h3>Cheetah Forums</h3>

@if ($forums->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Forum_title</th>
                <th>Forum_description</th>
                <th>Topics</th>
                <th>Posts</th>
                <th>Last_post</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($forums as $forum)
                <tr>
                    <td>{{{ $forum->forum_title }}}</td>
                    <td>{{{ $forum->forum_description }}}</td>
                    <td>{{{ $forum->topics }}}</td>
                    <td>{{{ $forum->posts }}}</td>
                    <td>{{{ $forum->last_post }}}</td>
                    <td>{{ link_to_route('forums.edit', 'Edit', array($forum->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('forums.destroy', $forum->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no forums
@endif

<p>{{ link_to_route('forums.create', 'Add new forum') }}</p>
@stop

@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/forums-index.css')}} ">
 
@stop
