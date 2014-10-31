<?php

class Model_Character_Sheet extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'ch_name',
		'usr_id',
		'ch_lvl',
		'ch_exp',
		'ch_stat_hp',
		'ch_stat_ep',
		'ch_stat_str',
		'ch_stat_agi',
		'ch_stat_int',
		'ch_stat_spd',
		'ch_cash',
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

	protected static $_table_name = 'character_sheets';

	public static function generate($id){

		$usr_id = Auth::get_user_id();

		if($id){
			$usr_id = $id;
			$query = DB::select('username')->from('users')->where('id', $usr_id)->execute();
			$result = $query->current();
			$ch_name = $result['username'];	
		}
		else{
			$usr_id = $usr_id[1];
			$ch_name = Auth::instance()->get_screen_name();
		}

		$sheet = self::forge(array(
			'ch_name'=> $ch_name,
			'usr_id'=> $usr_id,
			'ch_lvl'=> 1,
			'ch_exp'=> 0,
			'ch_stat_hp'=> 100,
			'ch_stat_ep'=> 100,
			'ch_stat_str'=> 20,
			'ch_stat_agi'=> 10,
			'ch_stat_int'=> 10,
			'ch_stat_spd'=> 10,
			'ch_cash'=> 500,
		));
		if($sheet and $sheet->save()){
			Session::set_flash('success', 'Character created successfuly');
			Response::redirect('./');
		}
		else{
			Session::set_flash('error', 'Something went wrong with character creation...');
			Response::redirect('./');
		}
	}

}
