<?php
return array(
	'_root_'  => 'story/index',  // The default route
	'_404_'   => '',    // The main 404 route
	
	//'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'register' => 'users/register_character',
	'login' => 'users/login',
	'logout' => 'users/logout',
	'character_sheet' => 'character/sheet/view'
);