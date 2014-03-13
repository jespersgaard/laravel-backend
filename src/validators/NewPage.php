<?php namespace Validators;

class NewPage extends Validator {

	public static $rules = array(
    'page_title' 	=> 	'required',
    'page_content'	=>	'required',
  	);
}