@extends('layout.main')

@section('content')
<div>
	<form action="{{ URL::route('account-sign-in-post') }}" method="post">

		<div class="field">
			Username: <input type="text" name='username' {{ (Input::old('username')) ? ' value="' . Input::old('username') . '"' : '' }}>
				@if($errors->has('username'))
					{{ $errors->first('username') }}
				@endif
		</div>

		<div class="field">
			Password: <input type="password" name='password'>
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
		</div>
		<div class="field">
			<input type="checkbox" name="remember" id="remember">
			Remember me
			
		</div>
		<input type="submit" value="Sign In">
		{{ Form::token() }}
	</form>
</div>
@stop