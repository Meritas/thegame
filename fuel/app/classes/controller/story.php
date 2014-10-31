<?php

class Controller_Story extends Controller_Template
{

	public function action_index()
	{
		$view = View::forge('story/index');

		//$data["subnav"] = array('index'=> 'active' );
		
		$li = array(Html::Anchor('fights/start/1', 'Zombie Boy'), Html::Anchor('fights/start/2', 'Normal Person'));
		$enemies = Html::Ul($li);

		$view->set('enemies', $enemies, false);
		$this->template->title = 'Story &raquo; Index'; 
		$this->template->content = $view;

	}

}