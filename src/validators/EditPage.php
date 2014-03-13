<?php namespace Validators;

class EditPage extends Validator {

	public static $rules = array(
    'page_title' 	=> 	'required',
    'page_content'	=>	'required',
    'page_slug'		=>	'required',
  	);
}