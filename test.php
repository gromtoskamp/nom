<?php
/**
 * Created by PhpStorm.
 * User: tom.groskamp
 * Date: 18/10/15
 * Time: 13:29
 */


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('app/Nom.php');

/** @var Db_Model_Conn $conn */
$select = Nom::getObject('Db_Model_Query_Select');

$select->setTable('object2');

echo '<pre>';
print_r($select);