<?php

class Controller_Story extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Story &raquo; Index';
		$this->template->content = View::forge('story/index', $data);
	}

}
