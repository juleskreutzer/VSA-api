<?php

/**
Deze API is gebaseerd op een tutorial. Zie hier de tutorial: http://coreymaynard.com/blog/creating-a-restful-api-with-php/
*/

  abstract class API{
  /**
  Propery: method
  Geeft aan welke HTTP request er ontvangen is -> POST, GET, PUT of delete
  */
  protected $method = "";

  /**
  Property: endpoint
  Geeft aan wat er wordt opgevraagd in de URI, bv. /users
  */
  protected $endpoint = "";
  /**
  Property: verb
  Geeft een extra waarde aan endpoint, bv /users/<ID> waarbij <ID> het ID van een specifieke gebruiker is
  */
  protected $verb = "";

  /**
  property: args
  Array voor meerdere waarden van een endpoint
  */
  protected $args = array();

  /**
  Constructor: __construct
  CORS toestaan, response data samenstellen
  */
  public function __construct($request)
  {
    // headers geven aan wat er is toegestaan
    header("Access-Control-Allow-Origin: *"); // Geen restrictie waar het verzoek vandaan komt
    header("Access-Control-Allow-Methods: *"); // Alle HTTP request mogen worden uitgevoerd (POST, PUT, GET, delete)
    header("Content-type: application/json"); // Type response, in dit geval wordt de response terug gezonden in JSON

    $this->args = explode('/', rtrim($request, '/')); // Alle argumenten ophalen, bv in /user/<id>/update/email/<email> : args zijn user, <id>, update, email, <email>
    $this->endpoint = array_shift($this->args); // argumenten weer in juiste volgorde zetten

    if(array_key_exists(0, $this->args) && !is_numeric($this->args[0]))
    {
      $this->verb = array_shift($this->args);
    }

    /**
    Controleren welke methode verzocht word.
    Dit kan POST of GET zijn.
    Wanneer het POST is, controleer of het ook een PUT of DELETE kan zijn
    */
    $this->method = $_SERVER['REQUEST_METHOD'];
    if($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER))
    {
      if($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT')
      {
        $this->method = 'PUT';
      }
      elseif($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE')
      {
        $this->method = 'DELETE';
      }
      else
      {
        throw new Exception("The Header seems invalid...");
      }
    }

    switch($this->method)
    {
      case 'DELETE':
      case 'POST':
        $this->request = $this->_cleanInputs($_POST);
        break;
      case 'GET':
        $this->request = $this->_cleanInputs($_GET);
        break;
      case 'PUT':
        $this->request = $this->_cleanInputs($_GET);
        $this->file = file_get_contents("php://input");
        break;
      default:
        $this->_response("Invalid Method", 405); // 405 is de error code die we meesturen
    }
  }

  public function processAPI()
  {
    if(method_exists($this, $this->endpoint)) // Controleren of het endpoint klopt
    {
      return $this->_response($this->endpoint,($this->args)); // Endpoint klopt, geef data terug
    }
    return $this->_response("No endpoint: $this->endpoint", 404); // Endpoint klopt niet, geef error 404 terug
  }

  private function _response($data, $status = 200)
  {
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status)); // Dit geeft aan welke status code we hebben gekregen, code 200 is standaard wanneer alles goed gaat
    return json_encode($data);
  }

/**
Bij de functie _cleanInputs controleren we de gegevens die zijn meegestuurd
Het betreft hier een recursieve methode.
De methode controleerd eerst of het een array is en stuur vervolgens 1 waarde opnieuw naar de functie
Deze waarde wordt vervolgens "veilig" gemaakt
*/
  private function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    private function _requestStatus($code)
    {
      $status = array(
          '200' => 'OK',
          '404' => 'Not Found',
          '405' => 'Invalid Method',
          '500' => 'Internal Server Error'
        );
      return ($status[$code])?$status[$code]:$status[500]; 
    }
}
?>
