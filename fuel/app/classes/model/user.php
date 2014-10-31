<?php

class Model_User extends \Orm\Model{

	protected static $_properties = array(
		'id',
		'username',
		'password',
		'email',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	public static function register_character(Fieldset $form){
		$form->add('username', 'Character Name')->add_rule('requred');
		$form->add('password', 'Password', array('type'=> 'password'))->add_rule('required');
		$form->add('password2', 'Repeat Password', array('type'=> 'password'))->add_rule('required');
		$form->add('email', 'Email')->add_rule('required')->add_rule('valid_email');
		$form->add('submit', ' ', array('type'=> 'submit', 'value'=> 'Create Character'));
		return $form;
	}

	public static function validate_creation_data(Fieldset $form, $auth){

		$form->field('password')->add_rule('match_value', $form->field('password2')->get_attribute('value'));
		$val = $form->validation(); //we validate the data with all the rules we've previously set(through add_rule)
		$val->set_message('required', 'The field :field is required');
		$val->set_message('match_value', 'Passwords don\'t match');
		$val->set_message('valid_email', 'Invalid e-mail address');

		if($val->run()){ //we run the validation
			$username = $form->field('username')->get_attribute('value');
			$password = $form->field('password')->get_attribute('value');
			$email = $form->field('email')->get_attribute('value');
			try{
				$user = $auth->create_user($username, $password, $email);
			}
			catch( Exception $e){
				$error = $e->getMessage();
			}
			if(isset($user)){
				Auth::login($username, $password);
			}
			else{
				if(isset($error)){
					$li = $error;
				}
				else{
					$li = 'Something went wrong with character creation.';
				}
				$errors = Html::ul(array($li));
				return(array('e_found'=> true, 'errors'=> $errors));
			}

		}
		else{
			$errors = $val->show_errors();
			return array('e_found'=> true, 'errors'=> $errors);
		}
	}
}
