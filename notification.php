<?php
  require_once '<user_dir>/vendor/autoload.php';
  putenv('GOOGLE_APPLICATION_CREDENTIALS=<user_dir>/service.json');       
  use Google\Auth\ApplicationDefaultCredentials;
  use GuzzleHttp\Client;
  use GuzzleHttp\HandlerStack;
  
  class NotificationSender{
    private $baseUri ='https://fcm.googleapis.com/';
    private $endPoint = '/v1/projects/{project_id}/messages:send';
    private $scope = 'https://www.googleapis.com/auth/firebase.messaging';
	private $client;
    
    function __construct($projectId){
        $this->endPoint = str_replace('{project_id}',$projectId,$this->endPoint);
		$middleware = ApplicationDefaultCredentials::getMiddleware($this->scope);
        $stack = HandlerStack::create();
        $stack->push($middleware);
        // create the HTTP client
        $this->client = new Client([
                  'handler' => $stack,
                  'base_uri' => $this->baseUri,
                  'auth' => 'google_auth'
                  ]);
    }
    
    function sendToTopic($topic,$title,$body){ 
	  try{
      // make the request
      $response = $this->client->request('POST',$this->endPoint,[
        'json' => ['message' => ['topic' => $topic,'notification' => ['body' => $body, 'title' => $title]]]
      ]);
     return strpos((string)$response->getBody(), "name")!==false;
	  }
	  catch(Exception $e){
		  return false;
     }
    }
  }	
?>