<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connect.php');

$loginStatus = false;

if(isset($_SERVER['x-auth-token']))
{
  $key = $_SERVER['x-auth-token'];
  // We still have to check if the token is correct!
  if($key == 'test')
  {
    GLOBAL $mysqli, $prefix;
    $sql = "SELECT authkey FROM ha_auth LIMIT 1";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
      if($row['authkey'] == $key)
      {
        $loginStatus = true;
      }
    }
    mysqli_free_result($result);
  }
}

if(!$loginStatus)
{

  header('HTTP/1.0 401 Unauthorized');

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
