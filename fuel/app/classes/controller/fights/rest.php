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
        $post = json_decode(file_get_contents('php://input'), true);
        
        $query = DB::select()->from('enemies')->where('id', $post['mobId'])->execute();        
        $response['mobData'] = $query->current();

        return $this->response(json_encode($response));
    }
}

?>