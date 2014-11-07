<?php

class Controller_Fights extends Controller_Template
{

	public function action_index($id){

		$view = View::forge('fights/index');
		if(isset($id)) $view->set('mobId', $id);
		$this->template->title = '';
		$this->template->content = $view;


        // returned Response object takes precedence and will show content without template
        //return new Response(View::forge('fights/json', $data));
	}

	public function action_fetch(){

		$data['title']   = "Example Page";
        $data['content'] = "Don't show me in the template";
        $data['post'] = $_POST;
		return new Response(View::forge('fights/json', $data));
	}

	public function action_getmob(){
		$data['title']   = "Example Page";
        $data['content'] = "Don't show me in the template";
		return new Response(View::forge('fights/requests/getmob', $data));
	}

	public function action_start($id){

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

		$this->template->title = 'Fights &raquo; Start';
		$this->template->content = $view;
	}

	public function action_next($id)
	{
		$query = DB::select()->from('enemies')->where('id', $id)->execute();
		$result = $query->current();

		$usr_id = Auth::get_user_id();
		$query_ch = DB::select()->from('character_sheets')->where('usr_id', $usr_id[1])->execute();
		$result_ch = $query_ch->current();
 		
 		$view = View::forge('fights/next');
 		$fight_state = Fieldset::forge('register');

		if(Input::post()){
			if(Input::post('hp') <= 0){
				Session::set_flash('success', 'You won!');
				Response::redirect('./');
			}
			if(Input::post('ch_hp') <= 0){
				Session::set_flash('error', 'You died!');
				Response::redirect('./logout');
			}


			$enemy = array('health'=> Input::post('hp'));
			$character = array('health'=> Input::post('ch_hp'));
			$fight_state->add('hp', 'Enemy HP', array('type'=>'hidden', 'value'=>(Input::post('hp') - rand(1, $result_ch['ch_stat_str']))));
			$fight_state->add('ch_hp', 'Character HP', array('type'=>'hidden', 'value'=>(Input::post('ch_hp') - rand( $result['dmg_min'],$result['dmg_max']) ) ));

			$view->set('enemy_hp', $enemy['health']);
			$view->set('character_hp', $character['health']);
		}
		else{
			$enemy = array('health'=> $result['hp_max']);
			$character = array('health'=> $result_ch['ch_stat_hp']);			
			$fight_state->add('hp', 'Enemy HP', array('type'=>'hidden', 'value'=>$enemy['health']));
			$fight_state->add('ch_hp', 'Character HP', array('type'=>'hidden', 'value'=>$character['health']));

			$view->set('enemy_hp', $enemy['health']); 
			$view->set('character_hp', $character['health']);
		}

		
		
		$fight_state->add('strike', ' ', array('type'=> 'submit', 'value'=> 'Strike'));

		$view->set('fight_state', $fight_state->build(), false);

		$this->template->title = 'Fights &raquo; Goes On';

		$this->template->content = $view;
	}

	public function action_end()
	{
		$data["subnav"] = array('end'=> 'active' );
		$this->template->title = 'Fights &raquo; End';
		$this->template->content = View::forge('fights/end', $data);
	}

	public function action_start_fight(){
		echo json_encode('40');
		exit;
	}
}
