@extends('layouts.bookcheetah')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Login
@stop

@section('content')
<div class="page-header">
	<h1>Edit your settings</h1>
</div>
<form method="post" action="" class="form-horizontal">
	<!-- First Name -->
	<div class="control-group {{ $errors->has('firstname') ? 'error' : '' }}">
		<label class="control-label" for="firstname">First Name</label>
		<div class="controls">
			<input type="text" name="firstname" id="firstname" value="{{ Request::old('firstname', $user->firstname) }}" />
			{{ $errors->first('firstname') }}
		</div>
	</div>
	<!-- ./ first name -->

	<!-- Last Name -->
	<div class="control-group {{ $errors->has('lastname') ? 'error' : '' }}">
		<label class="control-label" for="lastname">Last Name</label>
		<div class="controls">
			<input type="text" name="lastname" id="lastname" value="{{ Request::old('lastname', $user->lastname) }}" />
			{{ $errors->first('lastname') }}
		</div>
	</div>
	<!-- ./ last name -->

	<!-- Email -->
	<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<input type="text" name="email" id="email" value="{{ Request::old('email', $user->email) }}" />
			{{ $errors->first('email') }}
		</div>
	</div>
	<!-- ./ email -->

	<!-- Password -->
	<div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input type="password" name="password" id="password" value="" />
			{{ $errors->first('password') }}
		</div>
	</div>
	<!-- ./ password -->

	<!-- Password Confirm -->
	<div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
		<label class="control-label" for="password_confirmation">Password Confirm</label>
		<div class="controls">
			<input type="password" name="password_confirmation" id="password_confirmation" value="" />
			{{ $errors->first('password_confirmation') }}
		</div>
	</div>
	<!-- ./ password confirm -->

	<!-- Update button -->
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Update</button>
		</div>
	</div>
	<!-- ./ update button -->
</form>
@stop


@section('assets')
<!-- add your css and js here, dont add the jquery library again -->

 <link rel="stylesheet" href="{{ asset('assets/styles/css/account-index.css')}} ">
 
@stop
