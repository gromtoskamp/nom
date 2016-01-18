<?php
/**
 * Created by PhpStorm.
 * User: tom.groskamp
 * Date: 18/10/15
 * Time: 13:29
 */

class Db_Model_Conn extends Core_Model_Object
{

    protected $_server          = 'localhost';
    protected $_user            = 'root';
    protected $_password        = 'root';
    protected $_databaseName    = 'tom';

    /** @var mysqli $_conn */
    protected $_conn;
    protected $_database;

    /**
     * Opens a connection to the database, using provided credentials
     */
    public function getConn()
    {
        $server     = $this->_server;
        $user       = $this->_user;
        $password   = $this->_password;
        $databaseName  = $this->_databaseName;

        $conn = mysqli_connect($server, $user, $password, $databaseName);

        $this->_conn = $conn;
    }

    /**
     * Closes the current DB connection
     */
    public function closeConn()
    {
        if (!isset($this->_conn)){
            return;
        }

        $this->_conn->close();
    }

    /**
     * Executes a query in the current connection
     *
     * @param string $sql
     *
     * @return array $result
     */
    public function query($sql)
    {
        if (!isset($this->_conn)) {
            $this->getConn();
        }

        /** @var mysqli_result $result */
        $result = $this->_conn->query($sql);

        if (is_bool ($result)) {
            return $result;
        }

        foreach ($result as $row) {
            $resultArray[] = $row;
        }

        return $resultArray;
    }

    /**
     * @param $tableName
     *
     * @return array
     */
    public function describe($tableName)
    {
        $sql = 'DESCRIBE ' . $tableName;

        $result = $this->query($sql);

        return $result;
    }

}