<?php

class Db_Model_Query_Select extends Db_Model_Query
{

    /**
     * @var string $tableName;
     */
    public $tableName;

    /** @var array $fields */
    public $fieldsToSelect;

    /** @var  array $where */
    public $where;

    /** @var table information for validation purposes */
    public $table;

    public function setTable($tableName)
    {
        /** @var Db_Model_Query_Describe $describeModel */
        $describeModel = Nom::getObject('Db_Model_Query_Describe');

        try {
            $table = $describeModel->getTable('objec2t');
        } catch (Exception $e) {
            print_r($e->getMessage());
        }


        echo '<pre>';
        var_dump($table);

        echo 'test';
    }

    /**
     * @param String $field
     */
    public function addFieldToSelect($field)
    {


        $this->fields[] = $field;
    }

    public function addFieldArrayToSelect($fields)
    {
        foreach ($fields as $field) {
            $this->addFieldToSelect($field);
        }
    }




}