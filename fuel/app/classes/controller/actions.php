<?php

class Controller_Story_Actions extends Controller
{

	public function action_index()
	{
		$view = View::forge('story/index');
    
    	$query = DB::select()->from('enemies')->limit(2)->execute();
		$enemies = $query->current(); //var_dump($query); exit;
		
		$li = array(Html::Anchor('/pindex', 'Normal Person'), Html::Anchor('fights/start/3', 'Punk'));
		$enemies = Html::Ul($li);

		$view->set('enemies', $enemies, false);

		return $view;
	}

}