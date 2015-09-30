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
    GLOBAL $mysqli;

    if($this->method == 'GET')
    {
      @$username = $this->verb;
      @$password = $this->args[0];

      if(empty($username) || is_null($password))
      {
        return array("error" => "No username or password given");
      }
      $password = MD5(SHA1($password));

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

      $authString = "HackAttack123" + $username + $password + $email;
      $key = MD5($authString);

      $stmt = $mysqli->prepare("INSERT INTO ha_auth (username, password, email, authkey, description) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param('sssss', $username, $password, $email, $key, $desc);
      $result = $stmt->execute();
      $stmt->close();

      if($result)
      {
        return array("Success" => "User has been created.");
      }
      else {
        return array("Error" => "Something went wrong, please try again.", "Tip" => "You can only register one user per email address.");
      }
    }
    else {
      return array("error" => "The method you used is not accepted for this endpoint.");
    }
  }

  protected function settings()
  {
    GLOBAL $mysqli;
    if($this->method == 'GET')
    {
      $param = @$this->verb;

      switch($param)
      {
        case 'site_name':
            $this->getSiteName();
            break;
        case 'support_email':
            $this->getSupportEmail();
            break;
        case 'maintenance':
            $this->getMaintenance();
            break;
        default:
          return array("Error" => "Request not recognized.");
      }
    }
  }

  private function getSiteName()
  {
    GLOBAL $mysqli;
    $stmt = $mysqli->prepare("SELECT site_name FROM ha_settings");
    $stmt->execute();
    $stmt->bind_result($site_name);
    while($stmt->fetch())
    {
      $row[] = array("site_name" => $site_name);
    }
    $stmt->close();
    return($row);
  }
} ?>
