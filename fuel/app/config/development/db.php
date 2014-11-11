<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=thegame',
			'username'   => 'root',
			'password'   => '123',
		),
	),
);




/*return array(
	'default' => array(
	    'type'           => 'pdo',
    	'charset'        => '',
    	 'identifier' => '"',
	    'connection'     => array(
	        'dsn'            => 'pgsql:host=ec2-54-163-255-191.compute-1.amazonaws.com;dbname=d8qs65cemqupe2',
	        'username'       => 'dncglveqepldhf',
	        'password'       => 'TcAoOVviwh71pXWHo54hoUc8At',
	    ),	    
	)
);*/ //pgsql settings