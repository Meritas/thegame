<?php

class Controller_Fights_Rest extends Controller_Rest
{


    public function get_fetch()
    {
        return $this->response(array(
            'foo' => Input::get('foo'),
            'baz' => array(
                1, 50, 219
            ),
            'empty' => null
        ));
    }

    public function post_start(){
        $post = file_get_contents('php://input');
        return $this->response();
    }
}

?>