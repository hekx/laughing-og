<?php
class AccountController extends BaseController{

	public function getSignIn() {
		return View::make('account.signin');

	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(),
			array(
				'username'			=> 'required',
				'password'			=> 'required'
			)
		);

		if($validator->fails()){
				// Redirect into sign in page
			return Redirect::route('account-sign-in')
					-> withErrors($validator)
					->withInput();
		}
				// Attempt user sign in
			else {
			
			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'active' => 1
				));

			if($auth) {
				// Redirect to intended page
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-sign-in')
				->with('global', 'Your username or password is incorrect or your account has not been activated!');
			
			}
			
		} 

			return Redirect::route('account-sign-in')
				->with('global', 'There was a problem signing you in!. ');
			
	}	

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');

	}

	public function getCreate() {
		return View::make('account.create');

	}

	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username' 			=> 'required|max:50|min:3|unique:users', 
				'password' 			=> 'required|min:6|',
				'password_again'	=> 'required|same:password'

				)

			);

			if($validator->fails()) {
				return  Redirect::route('account-create')
						->withErrors($validator)
						->withInput();


			} else {
				
				$email 		= Input::get('email');
				$username 	= Input::get('username');
				$password 	= Input::get('password');

				// Activation code
				$code 		= str_random(60);

				$user	= User::create(array(
					'email'      => $email,
					'username'   => $username,
					'password' 	 => Hash::make($password),
					'code'		 => $code,
					'active'     => 0
				));

				if($user) {

					Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use($user) {

						$message->to($user->email, $user->username)->subject('Activate your account');
					
					});
				
					return  Redirect::route('home')
							->with('global', 'Your account has been created! We have sent you an email to activate your account');

			}

		}
	
	}

	public function getActivate($code) {
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			echo '<pre>', print_r($user), '</pre>';

			// Update user to active state
			$user->active 	= 1;
			$user->code 	= '';

			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Activated! You can now sign in!');

			}
		

		}

		return Redirect::route('home')
			->with('global', 'We could not activate your account! Try again later!');
		
	}

}