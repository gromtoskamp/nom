<?php

class Db_Model_Table extends Core_Model_Object
{

    /** @var String - The name of the table. */
    protected $_tableName;

    /** @var Array - The DESCRIBE result from the table. */
    protected $_columns;

    /** @var Array - The properties used for object construction. */
    protected $_properties;

    public function __construct($arguments)
    {
        if ( !(isset($arguments['tableName']) && isset($arguments['columns'])) ) {
            return;
        }

        $this->_tableName = $arguments['tableName'];
        $this->_columns = $arguments['columns'];
    }

    /**
     * Gets the properties of the table, to be used for object construction.
     */
    public function getProperties()
    {
        if (isset($this->_properties)) {
            return $this->_properties;
        }

        foreach ($this->_columns as $column) {
            $properties[] = $column['Field'];
        }

        $this->_properties = $properties;

        return $this->_properties;
    }

}