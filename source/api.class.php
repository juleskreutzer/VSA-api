<?php
require_once('api.base.class.php');
class HAAPI extends API{

  public function __construct($request, $origin)
  {
    parent::__construct($request);
    // Hier kunnen we iets doen met access tokens...

  }

/**
Example Endpoint
*/
  protected function example(){
    if($this->method == 'GET')
    {
      return array("info" => "Hi! The API is working correct.");
    }
    else {
      return array("error" => "This endpoint only accepts GET-requests.");
    }
  }

/**
About Endpoint
This will return some information about the API
*/
  protected function about()
  {
    if($this->method == 'GET')
    {
      $result = array(
        'name' => 'Hack Attack API',
        'description' => 'Onze Vrij Studie Activiteit (VSA) wordt gebruikt om de proftaak PTS3 uit te breiden',
        'authors' => array('Jules Kreutzer', 'Jasper Rouwhorst', 'Martijn Willems', 'Igor Chernomorets', 'Bart van Keersop'),
        'Opdracht_Gever' => 'Fontys Hogeschool ICT, Olaf Janssen',
        'support' => 'Jules@nujules.nl',
        'Version' => '0.1'
      );

      return $result;
    }
    else {
      return array("error" => "This endpoint only accepts GET-requests.");
    }
  }

  protected function authKey()
  {
    if($this->method == 'GET')
    {
      @$username = $this->verb;
      @$password = $this->args[0];

      if(empty($username) || is_null($password))
      {
        return array("error" => "No username or password given");
      }
      $password = MD5(SHA1($password));

      GLOBAL $mysqli, $prefix;
      $stmt = $mysqli->prepare("SELECT authKey
                                FROM ha_auth
                                WHERE username = ?
                                AND password = ?
                                LIMIT 1");
      $stmt->bind_param("ss", $username, $password);
      $stmt->execute();
      $stmt->bind_result($key);
      while($stmt->fetch())
      {
        $row[] = array("key" => $key);
      }
      $stmt->close();
      return($row);
    }
    else if($this->method == 'POST')
    {
      $username = $this->verb;
      $password = $this->args[0];
      $password = MD5(SHA1($password));
      $email = $this->args[1];
      $desc = $this->args[2];

      echo $username . " " . $password . " " . $email . " " . $desc;
    }
    else {
      return array("error" => "The method you used is not accepted for this endpoint.");
    }
  }
} ?>
