<?php

class Controller_Story_Index extends Controller_Template
{

	public function action_index()
	{
		$view = View::forge('story/index');
		$this->template->title = 'Story &raquo; Index'; 
		$this->template->content = $view;

	}

}