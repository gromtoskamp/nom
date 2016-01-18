<?php
/**
 * Created by PhpStorm.
 * User: tom.groskamp
 * Date: 08/11/15
 * Time: 14:17
 */

class Core_Model_Object
{

    const MAGIC_METHOD_GET = 'get';
    const MAGIC_METHOD_SET = 'set';
    const MAGIC_METHOD_HAS = 'has';

    public function __call($method, $arguments)
    {
        $magic = substr($method, 0, 3);
        $property = lcfirst(substr($method, 3));

        switch ($magic) {
            case self::MAGIC_METHOD_GET:
                return $this->$property;
            case self::MAGIC_METHOD_SET:
                $this->_set($property, $arguments[0]);
                return;
            case self::MAGIC_METHOD_HAS:
                if (isset($this->$property)) {
                    return true;
                }
                return false;
        }

        throw new Exception('No callable Magic Method found');
    }

    public function save()
    {
        $this->getResourceObject()->save();
    }

    private function _set($property, $value)
    {
        $this->$property = $value;
    }

    public function __construct()
    {

    }

}