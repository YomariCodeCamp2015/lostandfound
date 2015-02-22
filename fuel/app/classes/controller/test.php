<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller_Test extends \Fuel\Core\Controller_Rest
{

    public function get_list()
    {
        return $this->response(array(
            'foo' => Input::get('foo'),
            'baz' => array(
                1, 50, 219
            ),
            'empty' => null
        ));
    }
}
?>
