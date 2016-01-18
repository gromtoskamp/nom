<?php

require_once('test2.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$test = new test1();

class test1 extends test1
{


    public function __construct()
    {
        echo 'test1';
    }


}