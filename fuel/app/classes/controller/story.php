<?php

class Controller_Story extends Controller_Template
{

	public function action_index()
	{
		$view = View::forge('story/index');
    
    $query = DB::select()->from('enemies')->limit(2)->execute();
		$enemies = $query->current(); //var_dump($query); exit;
		
		$li = array(Html::Anchor('/pindex', 'Normal Person'), Html::Anchor('fights/start/3', 'Punk'));
		$enemies = Html::Ul($li);

		$view->set('enemies', $enemies, false);
		$this->template->title = 'Story &raquo; Index'; 
		$this->template->content = $view;

	}

}