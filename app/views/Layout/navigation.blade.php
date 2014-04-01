<nav>
    <ul>

  	 	<li><a href="{{ URL::route('home') }}">Home</a></li>
   		@if(Auth::check())
   			<li><a href="{{ URL::route('account-sign-out') }}">Sign out</li>

   		@else
    		<li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
    		<li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
  		@endif

    </ul>
</nav>