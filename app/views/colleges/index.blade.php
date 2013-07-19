@extends('layouts.scaffold')

@section('main')

<h1>All Colleges</h1>

<p>{{ link_to_route('colleges.create', 'Add new college') }}</p>

@if ($colleges->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>University</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($colleges as $college)
                <tr>
                    <td>{{{ $college->name }}}</td>
					<td>{{{ $college->university }}}</td>
                    <td>{{ link_to_route('colleges.edit', 'Edit', array($college->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('colleges.destroy', $college->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no colleges
@endif

@stop