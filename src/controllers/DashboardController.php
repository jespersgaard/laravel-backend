<?php namespace JeroenG\LaravelBackend\Controllers;

class DashboardController extends BaseController {

	public function showIndex()
	{
		$this->layout->content = \View::make('backend::dashboard');
	}
}