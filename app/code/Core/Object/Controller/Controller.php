<?php

/**
 * Class Object_Controller_Controller
 */
class Object_Controller_Controller extends Router_Controller_Controller
{

    public function testAction()
    {
        echo '<pre>';
        print_r($this->_params);
    }

}