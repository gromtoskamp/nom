<?php

class Db_Model_Query_Describe extends Db_Model_Query
{

    const DESCRIBE = 'DESCRIBE ';

    /**
     *
     */
    public function getTable($tableName)
    {
        $sql = self::DESCRIBE . $tableName;
        $result = $this->query($sql);

        $arguments['tableName'] = $tableName;
        $arguments['columns'] = $result;

        $table = Nom::getObject('Db_Model_Table', $arguments);

        return $table;
    }


}