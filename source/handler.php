<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connect.php');

$loginStatus = true;

if(isset($_SERVER['X_AUTH_TOKEN']))
{
  $key = $_SERVER['X_AUTH_TOKEN'];

    GLOBAL $mysqli, $prefix;
    
    $stmt = $mysqli->prepare("SELECT authkey FROM ha_auth WHERE authkey = :key");
    $stmt->bindParam(':key', $key);
    
    $stmt->execute();
    
    while($row = $stmt->fetch())
    {
      if($row['authkey'] == $key)
      {
        $loginStatus = true;
      }
    }
}

if(!$loginStatus)
{

  //header('HTTP/1.0 401 Unauthorized');

  echo 'You aren\'t authorized to use the API';
  return json_encode(array("error" => "Unauthorized to access API"));

} else {
  require('api.class.php');
  // Verzoeken van dezelfde server hebben geen HTTP_ORIGIN header
  if(!array_key_exists('HTTP_ORIGIN', $_SERVER))
  {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
  }

  try{
    $api = new HAAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $api->processAPI();
  }
  catch(Exception $e)
  {
    echo json_encode(Array('error' => $e->getMessage()));
  }
}
?>
