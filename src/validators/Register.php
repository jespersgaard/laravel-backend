<?php namespace Validators;

class Register extends Validator {

	public static $rules = array(
    'username' 	=> 	'required|unique:users',
    'email'		=>	'required|email|unique:users',
    'password'	=>	'required|min:5',
  	);
}