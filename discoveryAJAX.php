<?php 

if (!isset($_SESSION)) {
  session_start();
}

//include("functions.php");

date_default_timezone_set('America/Los_Angeles');

//$date = date("Y-m-d H:i:s");

$_POST['message'] = "I hate this service it is always down";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gateway.watsonplatform.net/discovery/api/v1/environments/aba229bc-80f9-4f45-a8b7-9f96817bc6b7/collections/72c91f15-2e7b-4300-a014-a4a1b8e4d3a8/query?version=2017-11-07&query=enriched_text.entities.text:180-degree&return=text,extracted_metadata,enriched_text",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic OTAzZDlkZWMtMmE3Zi00Y2ZhLTk2YjMtMzZkZTVhOWYwMTYyOk9NU3BZM2haQ3JNbg==",
    "Cache-Control: no-cache",
    "Postman-Token: eb22c89b-0c3b-9caf-9018-44630826adc9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
	
	echo "<br><br>";
	
	$decodedData = json_decode($response);
	
//	var_dump($decodedData);
//	
//	echo "<br><br>";
//	
//	echo var_dump($decodedData->results[0]->text);
}

  
?>
