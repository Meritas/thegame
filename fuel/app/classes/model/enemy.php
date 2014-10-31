<?php

class Model_Enemy extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'mood',
		'align',
		'dmg_min',
		'dmg_max',
		'hp_max',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'enemies';

}
