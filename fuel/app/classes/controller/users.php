<?php

class Controller_Users extends Controller_Template
{

	public function action_register_character()
	{
		$auth = Auth::instance();
		$view = View::forge('users/register_character');
		$form = Fieldset::forge('register');
		Model_User::register_character($form);

		if(Input::post()){
			$form->repopulate();
			$result = Model_User::validate_creation_data($form, $auth);
			if($result['e_found']){
				$view->set('errors', $result['errors'], false);
			}
			else{
				Response::redirect('character_sheet/generate');
			}
		}
		$view->set('reg', $form->build(), false);
		$this->template->title = 'Create Character';
		$this->template->content = $view;
	}

	public function action_login(){

		$view = View::forge('users/login');
		$form = Fieldset::forge('login');
		$auth = Auth::instance();

		$form->add('username', 'Character name');
		$form->add('password', 'Password', array('type'=> 'password'));
		$form->add('submit', ' ', array('type'=> 'submit', 'value'=> "Link start"));

		if(Input::post()){
			if($auth->login(Input::post('username'), Input::post('password'))){
				Session::set_flash('success', 'Welcome, '.$auth->instance()->get_screen_name());
				Response::redirect('story/index');
			}
			else{
				Session::set_flash('error', 'Link could not be established');
			}
		}

		$view->set('form', $form->build(), false);
		$this->template->title = 'Login to Alter World Online';
		$this->template->content = $view;
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		$this->template->title = 'Users &raquo; Logout';
		Response::redirect('./');
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Users &raquo; Delete';
		$this->template->content = View::forge('users/delete', $data);
	}

}
