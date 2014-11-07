<?php
	$query = DB::select()->from('enemies')->where('id', Input::post('mobId'))->execute();
	$result = json_encode($query->current());
	var_dump($_POST);
?>