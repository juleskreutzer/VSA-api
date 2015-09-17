<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Create a connection with the mysql-database
// create vars to store the data to connect to database
$DBVAR['user'] = 'nujulesn_HA';
$DBVAR['pass'] = 'HackAttack1!';
$DBVAR['dbname'] = 'nujulesn_hackattack';
$DBVAR['host'] = 'localhost';

// Database tables use a prefix for extra security
$prefix = 'HA_';
// connect to database
$mysqli = new mysqli($DBVAR['host'], $DBVAR['user'], $DBVAR['pass'], $DBVAR['dbname']);
if(mysqli_connect_errno())
{
  $error = array("Error" => "Could not connect to database!");
  return json_encode($error);
}
?>
