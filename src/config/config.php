<?php

return array(

	// Turn these on if you have those packages installed. The laravel-auth package (users) is included in this package.
	'menuItems' => array(
		'users' 	=> true,
		'gallery' 	=> true,
		'pages'		=> true,
		'activity'	=> true,
	),

	// Here you can add your own menu items.
	// You can choose an icon from http://semantic-ui.com/elements/icon.html#/basic and put here only the name of the icon.
	'customMenu' => array(
		'Home' => array(
			'route' => '/',
			'action'=> 'HomeController@showWelcome',
			'text' 	=> 'Back to site',
			'class' => 'item',
			'icon'	=>	'left arrow',
		),
	),

);