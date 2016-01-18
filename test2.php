<?php

require_once('test1.php');

class test2 extends test1
{

    public function __construct()
    {
        echo 'test2';
    }

}