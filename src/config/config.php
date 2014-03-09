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
	'customMenu' => array(
		'Home' => array(
			'route' => '/',
			'text' 	=> 'Back to site',
			'class' => 'item',
		),
	),

);