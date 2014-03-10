<?php namespace Validators;

abstract class Validator {

	protected $input;

	public $messages;

	public function __construct($input = null)
	{
		$this->input = $input ?: \Input::all();
	}

	public function passes()
  	{
    	$validation = \Validator::make($this->input, static::$rules);
 
    	if($validation->passes()) return true;
     
    	$this->messages = $validation->messages();
 
    	return false;
  }
}