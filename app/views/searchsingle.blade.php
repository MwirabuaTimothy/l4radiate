@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop


@section('content')
<!-- replace the content below to suit your page content -->


@if(isset($data[0]["ItemAttributes"]["Title"]))

    <ul id="searchresults">
        @foreach($data as $item)
        <li>
            {{ var_dump($item) }}
        </li>
        @endforeach
    </ul>
@else

 {{ printf($data) }}

@endif




@stop

@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/home-searchsingle.css')}} ">
 
@stop


