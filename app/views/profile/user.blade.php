@extends('layout.main')

@section('content')
	<p>{{ e($user->username) }}'s Profile</p>
	<p>Email: {{ e($user->email) }}</p>
@stop