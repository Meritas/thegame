<?php

namespace Fuel\Migrations;

class Create_character_sheets
{
	public function up()
	{
		\DBUtil::create_table('character_sheets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'ch_name' => array('constraint' => 255, 'type' => 'varchar'),
			'usr_id' => array('constraint' => 11, 'type' => 'int'),
			'ch_lvl' => array('constraint' => 11, 'type' => 'int'),
			'ch_exp' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_hp' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_ep' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_str' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_agi' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_int' => array('constraint' => 11, 'type' => 'int'),
			'ch_stat_spd' => array('constraint' => 11, 'type' => 'int'),
			'ch_cash' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('character_sheets');
	}
}