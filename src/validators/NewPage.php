<?php namespace Validators;

class NewPage extends Validator {

	public static $rules = array(
    'title' 	=> 	'required',
    'content'	=>	'required',
  	);
}