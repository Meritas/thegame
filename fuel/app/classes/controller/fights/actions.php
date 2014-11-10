<?php

class Controller_Fights_Actions extends Controller{

	public function action_start($id=1){

		echo $id;

		$query = DB::select()->from('enemies')->where('id', $id)->execute();
		$result = $query->current();

		$view = View::forge('fights/start');

		$startMessage = array(
			'name'=> $result['name'],
			'mood'=> $result['mood'],
			'align'=> $result['align'],
		);
		$view->set('start_message', $startMessage);
		$view->set('go_next', Html::Anchor('fights/next/'.$id, 'Proceed'), false);

		return $view;
	}
}
