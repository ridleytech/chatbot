<?php

//include("config.php");

$workspaceID = "1bc16f23-5149-4f36-9157-daa1184a53ed";
$username = "b5c3d7e5-ccb9-471a-890b-9b69a92f8d33";
$password = "NKWwo8xd1ZCb";
$date = "2017-05-26";

$curl = curl_init();

$server = "https://gateway.watsonplatform.net/";

$url = $server . "conversation/api/v1/workspaces/" . $workspaceID . "/message?version=" . $date;


//echo "<p>url: " . $url . "</p>";

$message = "I want to buy a car";

echo "sent message: " . $message;

echo "<br><br>";

//http://blog.getpostman.com/2016/02/03/curl-and-postman-work-wonderfully-together/
//https://www.getpostman.com/docs/postman/sending_api_requests/authorization

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"input\": {\"text\": \"" . $message . "\"}}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic YjVjM2Q3ZTUtY2NiOS00NzFhLTg5MGItOWI2OWE5MmY4ZDMzOk5LV3dvOHhkMVpDYg==",
    "Cache-Control: no-cache",
    "Content-type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
	  echo "cURL Error #:" . $err;
} 
else 
{
  	//echo $response;
	
	echo "Response <br><br>";
		
	$decodedData = json_decode($response);

	//var_dump($decodedData);

//	echo var_dump($decodedData->output);
//
//	echo "<br><br>";
//
//	echo var_dump($decodedData->context);
//
//	echo "<br><br>";

	$output = $decodedData->output->text[0];
	$context = $decodedData->context;

	echo "output: " . $output;

	echo "<br><br>";

	echo "context: " . json_encode($context);
}

//print_r ($resp);

echo "<br><br>";

echo "{\"data\":";
echo "{\"conversationData\":";
//echo $response;
echo "}";
echo "}";



//{
//  "conversation": [
//    {
//      "name": "daimlerchatbot-conversati-1512571144371",
//      "plan": "free",
//      "credentials": {
//        "url": "https://gateway.watsonplatform.net/conversation/api",
//        "username": "b5c3d7e5-ccb9-471a-890b-9b69a92f8d33",
//        "password": "NKWwo8xd1ZCb"
//      }
//    }
//  ]
//}

?>