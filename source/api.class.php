<?php
require_once('api.base.class.php');
class HAAPI extends API{

  public function __construct($request)
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
      return "This endpoint only accepts \'get\' requests.";
    }
  }
} ?>
