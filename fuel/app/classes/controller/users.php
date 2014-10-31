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
				Session::set_flash('success', 'Character created successfuly!');
				Response::redirect('story/index');
			}
		}
		$view->set('reg', $form->build(), false);
		$this->template->title = 'Create Character';
		$this->template->content = $view;
	}

	public function action_login()
	{
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Users &raquo; Login';
		$this->template->content = View::forge('users/login', $data);
	}

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Users &raquo; Logout';
		$this->template->content = View::forge('users/logout', $data);
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Users &raquo; Delete';
		$this->template->content = View::forge('users/delete', $data);
	}

}
