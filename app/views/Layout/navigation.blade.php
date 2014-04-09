
  <li><a href="{{ URL::route('home') }}">Home</a></li>

@if(Auth::check())

  <li><a href="{{ URL::route('profile-user', Auth::user()->username) }}">My Profile</a></li>
  <li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>
  <li><a href="{{ URL::route('account-change-password') }}">Change Password</a></li>
                   	
@else

  <li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
  <li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
  <li><a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a></li>

@endif


    