<?php namespace Validators;

class EditUser extends Validator {

	public static $rules = array(
    'username' 	=> 	'required',
    'email'		=>	'required|email',
    'password'	=>	'required|min:5',
  	);
}