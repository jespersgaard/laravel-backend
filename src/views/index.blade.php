@extends('backend::layouts.master')
@section('content')

@include('backend::partials.messages')

<h1>Please log in</h1>

{{ Form::open(array('url' => 'admin/login', 'class' => 'ui form')) }}

	<div class="field">
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username'); }}
	</div>

	<div class="field">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}
	</div>

	{{ Form::submit("Log in", array('class' => 'ui blue submit button')) }}

{{ Form::close() }}
@stop