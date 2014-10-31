<?php

class Controller_Character_Sheet extends Controller_Template
{

	public function action_generate($id=null)//default mode for call from user registration
	{
			Model_Character_Sheet::generate($id);
	}

	public function action_view()
	{
		$usr_id = Auth::instance()->get_user_id();

		$query = DB::select()->from('character_sheets')->where('usr_id', $usr_id[1])->execute();
		$ch_sheet = $query->current();
		$view = View::forge('character/sheet/view');

		$ch_name = $ch_sheet['ch_name'];
		$ch_info = array(
			'Level'=> $ch_sheet['ch_lvl'],
			'Experience'=> $ch_sheet['ch_exp'],
			'HP'=> $ch_sheet['ch_stat_hp'],
			'Energy'=> $ch_sheet['ch_stat_ep'],
			'Strength'=> $ch_sheet['ch_stat_str'],
			'Agility'=> $ch_sheet['ch_stat_agi'],
			'Inteligence'=> $ch_sheet['ch_stat_int'],
			'Speed'=> $ch_sheet['ch_stat_spd'],
			'Money'=> $ch_sheet['ch_cash'],
		);
		$view->set('ch_name', $ch_name);
		$view->set('ch_info', $ch_info);

		$this->template->title = 'Character sheet &raquo; View';

		$this->template->content = $view;
	}

	public function action_edit()
	{
		$data["subnav"] = array('edit'=> 'active' );
		$this->template->title = 'Character sheet &raquo; Edit';
		$this->template->content = View::forge('character/sheet/edit', $data);
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Character sheet &raquo; Delete';
		$this->template->content = View::forge('character/sheet/delete', $data);
	}

	public function action_reset()
	{
		$data["subnav"] = array('reset'=> 'active' );
		$this->template->title = 'Character sheet &raquo; Reset';
		$this->template->content = View::forge('character/sheet/reset', $data);
	}

}
