<?php namespace JeroenG\LaravelBackend\Controllers;

use JeroenG\LaravelAuth\Models\User;

class UsersController extends BaseController {

	public function showIndex()
	{
		$users = \Auth::allUsers('object', true);
		$this->layout->content = \View::make('backend::users.index')->with('users', $users);
	}

	public function showNew()
	{
		$this->layout->content = \View::make('backend::users.new');
	}

	public function postNew()
	{
		$input = array(
			'username'	=>	\Input::get('username'),
			'email'		=>	\Input::get('email'),
			'password'	=>	\Input::get('password'),
		);

		$v = new \Validators\Register;
		if($v->passes($input))
		{
			if (\Auth::addUser($input['username'], $input['password'], $input['email']))
			{
				return \Redirect::to('admin/users');
			}
			return \Redirect::back()->withInput()->withErrors(array('Unable to create a new user'));
	  	}
	   	return \Redirect::back()->withInput()->withErrors($v->messages);
	}

	public function showEdit($userId)
	{
		$user = User::find($userId);
        if (is_null($user))
        {
            return Redirect::to('admin/users');
        }

		$this->layout->content = \View::make('backend::users.edit')->with('user', $user);
	}

	public function postEdit($userId)
	{
		$userPassword = User::select('password')->where('id', $userId)->get()[0]->password;
		$input = array(
			'username'	=>	\Input::get('username'),
			'email'		=>	\Input::get('email'),
			'password'	=>	\Input::get('password'),
		);
		if(empty($input['password'])) $input['password'] = $userPassword;

		$v = new \Validators\EditUser;
		if($v->passes($input))
		{
			// TODO: update user
			return \Redirect::back()->withInput()->withErrors(array('Unable to edit a new user'));
	  	}
	   	return \Redirect::back()->withInput()->withErrors($v->messages);
	}

	public function doDisable($userId)
	{
		\Auth::deleteUser($userId, false);
		return \Redirect::back();
	}

	public function doEnable($userId)
	{
		$user = User::onlyTrashed()->where('id', $userId)->restore();
		return \Redirect::back();
	}

	public function doDelete($userId)
	{
		\Auth::deleteUser($userId, true);
		return \Redirect::back();
	}
}