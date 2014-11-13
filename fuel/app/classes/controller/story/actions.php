<?php

class Controller_Story_Actions extends Controller
{

	public function action_index(){
		
	}

	public function action_enemies(){

		$view = View::forge('story/enemies');
    
    	$query = DB::select()->from('enemies')->limit(2)->execute();
		$enemies = $query->current(); //var_dump($query); exit;
		
		$li = array(Html::Anchor('fights/start/2', 'Normal Person'), Html::Anchor('fights/start/3', 'Punk'));
		$enemies = Html::Ul($li);

		$view->set('enemies', $enemies, false);

		return $view;
	}

}