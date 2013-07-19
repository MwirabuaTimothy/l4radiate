@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')

<!-- <h1>All Courses</h1> -->
@if ($courses->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="tr_size">Course No</th>
				<th class="tr_size">Course Name</th>
                <th class="tr_size">Book</th>
				<th class="tr_size">Semester</th>
				<!-- <th class="tr_size">Semester</th> -->
				<th class="tr_size">Professor</th>
				
            </tr>
        </thead>

        <tbody>
            @foreach ($courses as $course)
                <tr class="tr_size">
                    <td class="td_size">{{{ $course->course_number }}}</td>
					<td class="td_size">{{{ $course->course_name }}}</td> 
                    <td class="td_size">{{{ $course->book }}}</td>
					<td class="td_size">{{{ $course->fall_semester }}}</td>
					<!-- <td class="td_size">{{{ $course->spring_semester }}}</td> -->
					<td class="td_size">{{{ $course->professor }}}</td>
					
                    <!-- <td>{{ link_to_route('courses.edit', 'Edit', array($course->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('courses.destroy', $course->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no courses
@endif

<p>{{ link_to_route('courses.create', 'Add Course') }}</p> <br />

<!-- {{{ $course->course_number }}} -->

@stop


@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/courses-index.css')}} ">
 
@stop

