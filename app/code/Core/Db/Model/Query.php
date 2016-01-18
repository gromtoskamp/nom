<?php

/**
 * Class Db_Query
 */
class Db_Model_Query extends Db_Model_Conn{

    public function __construct()
    {
    }

    /**
     * @param array $values
     * @param       $table
     *
     * @return string
     */
    public function select(array $values, $table)
    {

        foreach ($values as $value) {

        }
    }

    public function insert() {}

    public function update() {}

    public function delete() {}

    public function where() {}

    public function from() {}

}