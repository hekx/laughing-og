<?php
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'
));

/*
| Authenticated group
*/
Route::group(array('before' => 'auth'), function() { 

	/*
	| Signout
	*/

	Route::get('account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
		));

});
/*
| Unautheticated group
*/
Route::group(array('before' => 'guest'), function() { 


	/*
	| CSRF protection group---------------------------------------------------------------------------------------------
	*/



		Route::group(array('before' => 'csrf'), function() {
		/*
		| Create Account (POST)
		*/
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		
		));


		/*
		| Sign In (POST)
		*/
		Route::post('account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'

		));


});


//--------------------------------------------------------------------------------------------------------------------------


	/*
	| Sign In (GET)
	*/
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'

	));


	/*
	| Create Account (GET)
	*/

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
		
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'

	));


});

