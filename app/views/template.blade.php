@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop

@section('content')
<!-- replace the content below to suit your page content -->


@stop

@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/template.css')}} ">

@stop


