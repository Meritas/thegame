<?php

namespace Fuel\Migrations;

class Create_enemies
{
	public function up()
	{
		\DBUtil::create_table('enemies', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'mood' => array('constraint' => 255, 'type' => 'varchar'),
			'align' => array('constraint' => 255, 'type' => 'varchar'),
			'dmg_min' => array('constraint' => 11, 'type' => 'int'),
			'dmg_max' => array('constraint' => 11, 'type' => 'int'),
			'hp_max' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('enemies');
	}
}