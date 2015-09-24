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
      return "Hi! The API is working correct.";
    }
    else {
      return "This endpoint only accepts GET-requests.";
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
      return "This endpoint only accepts GET-requests.";
    }
  }

  protected function user()
  {
    if($this->method == 'GET')
    {
      return "The user-endpoint hasn't been implemented yet.";
    }
    else
    {
      return "This endpoint only accepts GET-requests.";
    }
  }
} ?>
