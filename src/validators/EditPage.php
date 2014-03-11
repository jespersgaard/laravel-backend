<?php namespace Validators;

class EditPage extends Validator {

	public static $rules = array(
    'title' 	=> 	'required',
    'content'	=>	'required',
    'slug'		=>	'required',
  	);
}