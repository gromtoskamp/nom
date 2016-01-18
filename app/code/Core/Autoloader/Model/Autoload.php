<?php

function __autoload($className)
{
    return Autoloader_Model_Autoload::autoload($className);
}

class Autoloader_Model_Autoload
{

    public static function autoload($className)
    {
        Nom::getObject($className);
    }

}