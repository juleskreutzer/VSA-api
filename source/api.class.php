<?php
require_once('api.base.class.php');
class HAAPI extends API{

  public function __construct($request, $origin)
  {
    parent::__construct($request);
  }

/**
Example Endpoint
*/
  protected function example(){
    if($this->method == 'GET')
    {
      return array("info" => "Hi! The API is working correct.", "tip" => "parse JSON in java using this library: http://www.json.org/java/");
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

  /**
  This method can create a authorization key and store it in the database with the given params,
  or get the authorization key based on a username and password
  */
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

  /**
  Get or change the website settings with this method
  */
  protected function settings()
  {
    GLOBAL $mysqli;
    if($this->method == 'GET')
    {
      $param = @$this->verb;

      switch($param)
      {
        case 'site_name':
            $result = $this->getSettings('site_name');
            return($result);
            break;
        case 'support_email':
            $result = $this->getSettings('support_email');
            return($result);
            break;
        case 'maintenance':
            $result = $this->getSettings('maintenance');
            return($result);
            break;
        default:
          return array("Error" => "Request not recognized.");
      }
    }
    else if($this->method == 'POST')
    {
      $param = @$this->verb;

      if($param == 'maintenance' && empty(@$this->args[0]))
      {
        $this->args[0] = 0;
      }
      else if(empty(@$this->args[0]))
      {
        return array("Error" => "No arguments given.");
      }

      switch($param)
      {
        case 'site_name':
            $this->setSettings('site_name', $this->args[0]);
            break;
        case 'support_email':
            $this->setSettings('support_email', $this->args[0]);
            break;
        case 'maintenance':
            $this->setSettings('maintenance', $this->args[0]);
            break;
        default:
            return array("Error" => "Request not recognized.");
      }
    }
    else
    {
      return array("Error" => "The method you used is not accepted for this endpoint.");
    }
  }

  /**
  This method will return the the requested site settings
  @param var - This is the keyword used to search the database to return the result
  */
  private function getSettings($var)
  {
    GLOBAL $mysqli;
    $stmt = $mysqli->prepare("SELECT $var FROM ha_settings");
    $stmt->execute();
    $stmt->bind_result($result);
    while($stmt->fetch())
    {
      $row[] = array("result" => $result);
    }
    $stmt->close();
    return($row);
  }

  /**
  This method will change the record in the database to the given VALUES
  @param var - This is the keyword used to change the record in the database
  @param arg - This is the argument that will be stored in the database
  */
  private function setSettings($var, $arg)
  {
      GLOBAL $mysqli;
      $stmt = $mysqli->prepare("UPDATE ha_settings SET $var = '$arg'");
      $result = $stmt->execute();
      $stmt->close();
  }

  /**
  This function will return the high score for players
  */
  protected function highscore()
  {
    if($this->method == 'GET')
    {
      $amount = @$this->args[0] > 1 ? "LIMIT " . $this->args[0] : "LIMIT 50";

      GLOBAL $mysqli;

      $stmt = $mysqli->prepare("SELECT displayname, score FROM ha_user ORDER BY score " . $amount);
      $stmt->execute();
      $stmt->bind_result($displayname, $score);
      while($stmt->fetch())
      {
        $row[] = array("Highscore" => array($displayname, $score));
      }
      $stmt->close();
      if(isset($row)){
        return($row);
      }else{
        return array("Error" => "No players found.");
      }
    }
    else{
      return array("Error" => "This endpoint only accepts GET requests.");
    }
  }

  /**
  Get the data for each module for the game, or get a specific module using verb
  */
  protected function module()
  {
    if($this->method == 'GET')
    {
      $param = @$this->verb;

      switch($param)
      {
        case 'money':
          $result = $this->getModuleData('money');
          return $result;
          break;
        case 'base':
          $result = $this->getModuleData('base');
          return $result;
          break;
        case 'defense':
          $result = $this->getModuleData('defense');
          return $result;
          break;
        case 'all':
          $result = $this->getModuleDataAll();
          return $result;
        default:
          $result = $this->getModuleDataAll();
          return $result;
      }
    }
    else
    {
      return array("Error" => "This endpoint only accepts GET-requests.");
    }
  }

  /**
  Get module data based on a specific keyword
  */
  private function getModuleData($var)
  {
    GLOBAL $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM ha_module WHERE class = ? ORDER BY name, tier");
    $stmt->bind_param("s", $var);
    $stmt->execute();
    $stmt->bind_result($id, $name, $class, $tier, $description, $damage, $frequency, $range, $price, $sell_price, $type, $effect, $value);
    while($stmt->fetch())
    {
      $row[] = array("name" => $name, "class" => $class, "damage" => $damage, "tier" => $tier, "description" => $description, "frequency" => $frequency, "range" => $range, "price" => $price, "sell_price" => $sell_price, "type" => $type, "effect" => $effect, "value" => $value);
    }

    if(isset($row))
    {
      return($row);
    }
    else
    {
      return array("Error" => "No modules found on criteria.");
    }
  }

  /**
  Get all module data
  */
  private function getModuleDataAll()
  {
    GLOBAL $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM ha_module ORDER BY name, tier");
    $stmt->execute();
    $stmt->bind_result($id, $name, $class, $tier, $description, $damage, $frequency, $range, $price, $sell_price, $type, $effect, $value);
    while($stmt->fetch())
    {
      $row[] = array("name" => $name, "class" => $class, "damage" => $damage, "tier" => $tier, "description" => $description, "frequency" => $frequency, "range" => $range, "price" => $price, "sell_price" => $sell_price, "type" => $type, "effect" => $effect, "value" => $value);
    }

    if(isset($row))
    {
      return($row);
    }
    else
    {
      return array("Error" => "No modules found on criteria.");
    }

  }

  /**
  This endpoint will return the data about all minions that are available
  */
  protected function minion()
  {
    if($this->method == 'GET')
    {
      GLOBAL $mysqli;
      $stmt = $mysqli->prepare("SELECT name, hp, damage, speed, encrypted, reward FROM ha_minion");
      $stmt->execute();
      $stmt->bind_result($name, $hp, $damage, $speed, $encrypted, $reward);
      while($stmt->fetch())
      {
        $row[] = array('name' => $name, 'hitpoints' => $hp, 'damage' => $damage, 'speed' => $speed, 'encrypted' => $encrypted, 'reward' => $reward);
      }
      $stmt->close();
      return($row);

    }
    else {
      return array("Error" => "This endpoint only accepts GET-requests.");
    }
  }

  /**
  This endpoint will return the data about all spells that are available
  */
  protected function spell()
  {
    if($this->method == 'GET')
    {
      GLOBAL $mysqli;
      $stmt = $mysqli->prepare("SELECT * FROM ha_spell");
      $stmt->execute();
      $stmt->bind_result($id, $name, $type, $defense_range, $cooldown, $requiredLevel, $duration);
      while($stmt->fetch())
      {
        $row[] = array('name' => $name, 'type' => $type, 'defense_range' => $defense_range, 'cooldown' => $cooldown, 'requiredLevel' => $requiredLevel, 'duration' => $duration);
      }
      $stmt->close();
      return($row);
    }
    else {
      return array("Error" => "This endpoint only accepts GET-requests.");
    }
  }

  /**
  The login endpoint is used to login a player in the game. The endpoint needs the username and password.
  It will then return all data of the player what can be used ingame.
  */
  protected function login()
  {
    if($this->method == 'POST')
    {
      $username = @$this->verb;
      $password = @$this->args[0];

      if(empty($username))
      {
        $row[] = array("status" => 0, "Error" => "No username given.");
        return($row);
      }
      else if(empty($password))
      {
        $row[] = array("status" => 0, "Error" => "No password given.");
        return($row);
      }

      // Encrypt the password using MD5
      $encryptedPassword = MD5($password);

      GLOBAL $mysqli;
      $stmt = $mysqli->prepare("SELECT id, displayName, score  FROM ha_user WHERE username = ? AND password = ?");
      $stmt->bind_param("ss", $username, $encryptedPassword);
      $result = $stmt->execute();
      $stmt->bind_result($id, $displayName, $score);
      $stmt->store_result();
      $rows = $stmt->num_rows;
      while($stmt->fetch())
      {
        if($rows > 0)
        {
          $row[] = array("status" => "1", "id" => $id, "displayName" => $displayName, "score" => $score, "username" => $username);
          $stmt->close();
          return($row);
        }
        else if($rows == 0) {
          $row[] = array("status" => "0", "Error" => "Username or password is incorrect.");
          $stmt->close();
          return($row);
        }
      }

      $row[] = array("status" => "0", "Error" => "Username or password is incorrect.");
      return($row);
    }
    else {
      return array("status" => "0", "Error" => "This endpoint only accepts POST-requests.");
    }
  }

  /**
  Register a new user account
  First we check if all required values are given. Then we check if the username or email address have been used before to register a user account.

  If the password has been given, we encrypt it again. This will be a simple MD5 encryption. For extra security, also encrypt the password before sending it to the API. This will be the responsibility of the developer using the API.
  After all the checks passed, we create a new user account.
  */
  protected function register()
  {
    if($this->method == 'POST')
    {
      $username = @$this->verb;
      $password = @$this->args[0];
      $displayname = @$this->args[1];
      $email = @$this->args[2];

      // Check if all values are given
      if($username == '')
      {
        $row[] = array("Error" => "No username given");
        return($row);
      }
      else if($password == '')
      {
        $row[] = array("Error" => "No password given");
        return($row);
      }
      else if($displayname == '')
      {
        $row[] = array("Error" => "No displayname given");
        return($row);
      }
      else if($email == '')
      {
        $row[] = array("Error" => "No email given");
        return($row);
      }

      // Encrypt the password using MD5
      $encryptedPassword = MD5($password);

      GLOBAL $mysqli;
      $stmt = $mysqli->prepare("SELECT count('email') AS email FROM ha_user WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($mail);
      while($stmt->fetch())
      {
        if($mail > 0)
        {
          $row[] = array("Error" => "There is already a user account created on this email address.");
          return($row);
        }
      }
      $stmt->close();

      $st = $mysqli->prepare("SELECT count('username') AS username FROM ha_user WHERE username = ?");
      $st->bind_param("s", $username);
      $st->execute();
      $st->bind_result($user);
      while($st->fetch())
      {
        if($user > 0)
        {
          return array("Error" => "This username is already in use with another account");
        }
      }

      $statement = $mysqli->prepare("INSERT INTO ha_user(displayName, username, password, email) VALUES (?, ?, ?, ?)");
      $statement->bind_param("ssss", $displayname, $username, $encryptedPassword, $email);
      $result = $statement->execute();
      $statement->close();

      if($result)
      {
        $row[] = array("Success" => "The user has been registered!");
        return($row);
      }
      else
      {
        $row[] = array("Error" => "Something went wrong, please try again. (API Failure)");
        return($row);
      }
    }
    else{
      $row[] = array("Error" => "This endpoint only accepts POST-requests");
      return($row);
    }
  }

  protected function updateScore()
  {
    if($this->method == 'POST')
    {
      $uID = @$this->args[0];
      $score = @$this->args[1];



      if($uID == "")
      {
        $row[] = array("Error" => "No user ID given");
        return($row);
      }
      else if($score == "")
      {
        $row[] = array("Error" => "No score given");
        return($row);
      }

      GLOBAL $mysqli;

      $stmt = $mysqli->prepare("UPDATE ha_user SET score = score + ? WHERE id = ?");
      $stmt->bind_param("ss", $score, $uID);
      $result = $stmt->execute();
      $stmt->close();

      if($result)
      {
        $row[] = array("Success" => "The score has been updated");
        return($row);
      }
      else {
        $row[] = array("Error" => "Something went wrong, please try again");
        return($row);
      }

    }
    else {
      $row[] = array("Error" => "This endpoint only accepts POST-requests");
      return($row);
    }
  }
}
?>
