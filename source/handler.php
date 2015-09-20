<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require('api.class.php');
// Verzoeken van dezelfde server hebben geen HTTP_ORIGIN header
if(!array_key_exists('HTTP_ORIGIN', $_SERVER))
{
  $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try{
  $api = new HAAPI($_REQUEST['request']);
  echo $api->processAPI();
}
catch(Exception $e)
{
  echo json_encode(Array('error' => $e->getMessage()));
}
?>
