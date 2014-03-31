<?php

class HomeController extends BaseController {
    public function home() {


    	Mail::send('emails.auth.test', array('name' => 'Alex' ), function($message) {
    		$message->to('hekx@ogniton.net', 'Ken Eyre')->subject('Test Email');
    	});


        return View::make('home');
        
    }
    
}
