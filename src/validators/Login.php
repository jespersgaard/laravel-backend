<?php namespace Validators;

class Login extends Validator {

	public static $rules = array(
    'username' 	=> 	'required',
    'password'	=>	'required',
  	);
}