<?php header('Content-type: application/xml'); 

if (!isset($_SESSION)) {
  session_start();
}

require_once('../Connections/realestatechatbot.php');
include("functions.php");

date_default_timezone_set('America/Detroit');

$date1 = date("g:i A");

$workspaceID = "d232dacd-8634-435a-ba1a-43cb7ffadc14"; //real estate
$username = "b5c3d7e5-ccb9-471a-890b-9b69a92f8d33";
$password = "NKWwo8xd1ZCb";
$date = "2017-05-26";

$curl = curl_init();

$server = "https://gateway.watsonplatform.net/";

$url = $server . "conversation/api/v1/workspaces/" . $workspaceID . "/message?version=" . $date;


//$_POST['message'] = "I want to buy a house";
//$_POST['message'] = "I hate this service its always down";
//$_POST['message'] = "A-Class";
//$_POST['message'] = "100";
//$_POST['message'] = "yes";
//$_POST['message'] = "yes";

$context = "";

if (isset($_SESSION['context'])) {
	
  $context = ",\"context\": " . json_encode($_SESSION['context']) . "";
}


$postval = "{\"input\": {\"text\": \"" . $_POST['message'] . "\"}".$context."}";

//echo "postval: " . $postval . "<br><br>";

//echo "context: ".json_encode($_SESSION['context']);

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postval,
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
	  //echo "cURL Error #:" . $err;
} 
else 
{
  	//echo $response;
	
	//echo "Response <br><br>";
		
	$decodedData = json_decode($response);
	
	//print_r($decodedData);

	//var_dump($decodedData);

//	echo var_dump($decodedData->output);
//
//	echo "<br><br>";
//
//	echo var_dump($decodedData->context);
//
//	echo "<br><br>";

	$text = $decodedData->output->text;
	
	
	$output = implode("--",$text);
	
	$context = $decodedData->context;
	
	$_SESSION['context'] = $context;

//	echo "output: " . $output;
//
//	echo "<br><br>";
//
//	echo "context: " . json_encode($context);
	
	
	//if message is inquiry, run discovery 
	
	$intent = $decodedData->intents[0]->intent;
	
	if(contains("&getproperties",$output))
	{
		$_SESSION['flights'] = [];
		
		mysql_select_db($database_iflybot, $iflybot);
		$query_rsContext = "SELECT * FROM properties WHERE city LIKE '%" . $context->destination . "%' order by scheduled ASC";

		$rsContext = mysql_query($query_rsContext, $iflybot) or die(mysql_error());
		$row_rsContext = mysql_fetch_assoc($rsContext);
		$totalRows_rsContext = mysql_num_rows($rsContext);
		
		$counter = 1;		
		
		$format = "";
		
		$html = "<div class='senderDiv'>  <p id='senderMessageTime'>".$format."</p>  <div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessagePhoto' class='clearfix'>  <div class='listingsContainer'><div class='listingsContent'>  ";

		if($totalRows_rsContext)
		{			
			
			do {
				
				$flightnumber = $row_rsContext['flightnumber'];					
				$destination = $row_rsContext['destination'];
				$gate = $row_rsContext['gate'];
				
				//update departure date from context->departureDate							
				
				$flight .= $counter . ". " . $flightnumber . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $dateoutput . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $destination."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $gate."<br>";
				
				$listing = "<div class='listing'><img src='images/".$row_rsContext['image']."' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$90,000 - 4 bed - 3 bath - 4000 SqFt </div></div>  </div>  <div class='listing'><img src='images/house2.jpg' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$150,000 - 4 bed - 3 bath - 4000 SqFt </div></div>  </div>  <div class='listing'><img src='images/house3.jpg' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$120,000 - 4 bed - 3 bath - 4000 SqFt </div>";
				
				$counter++;

			}  while ($row_rsContext = mysql_fetch_assoc($rsContext));
			
			$output = str_replace("&gettimes",$flight,$output);
			
			$html .= "</div>  </div></div>  </div></div></div>";
		}
		else
		{
			$output = "No flight data for " . $context->destination;
		}
	}
	else if($intent == "inquiry")
	{
		$entity1 = $decodedData->entities[0]->value;
		$confidence1 = $decodedData->entities[0]->confidence;
		
		$curl = curl_init();
		
		//change workspace ID from copied workspace

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://gateway.watsonplatform.net/discovery/api/v1/environments/aba229bc-80f9-4f45-a8b7-9f96817bc6b7/collections/72c91f15-2e7b-4300-a014-a4a1b8e4d3a8/query?version=2017-11-07&query=enriched_text.concepts.text:".$entity1."&return=text,extracted_metadata,enriched_text",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Basic OTAzZDlkZWMtMmE3Zi00Y2ZhLTk2YjMtMzZkZTVhOWYwMTYyOk9NU3BZM2haQ3JNbg==",
			"Cache-Control: no-cache",
			"Postman-Token: 12a646a6-1b13-6ff0-0d4e-3d7623f4a585"
		  ),
		));

		$discoveryResponse = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $discoveryResponse;
			
			$decodedDiscoveryData = json_decode($discoveryResponse);
			
			$decodedData = $decodedDiscoveryData; //for xml output

			//var_dump($decodedData);

			//echo "<br><br>";

			echo var_dump($decodedDiscoveryData->results[1]->text);
		}
	}	
}

//analyze tone
//
//$curl = curl_init();
//
//curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://gateway.watsonplatform.net/tone-analyzer/api/v3/tone?version=2017-09-21&text=". urlencode($_POST['message']). "",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 30,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "GET",
//  CURLOPT_HTTPHEADER => array(
//    "Authorization: Basic NmI3MjNmMTUtMWQwMy00NmVkLWE4ZDYtNTE0MmVhY2UzN2JhOmRmZkxiTkZ5enRoSw==",
//    "Cache-Control: no-cache",
//    "Content-type: application/json",
//    "Postman-Token: 7daae32b-d656-a264-e4ce-451c621f64ca"
//  ),
//));
//
//$responseTone = curl_exec($curl);
//$err = curl_error($curl);
//
//curl_close($curl);
//
//if ($err) {
//	
//  //echo "cURL Error #:" . $err;
//	
//} else {
//	
//  //echo "response: " . $response;	
//	
//	$decodedData2 = json_decode($responseTone);
//
//	//print_r($decodedData);
//
//	//var_dump($decodedData);
//
//	$tones = $decodedData2->document_tone->tones;
//
//	//var_dump($tones);
//
//	$count = count($tones);
//
//	$toneString = "";
//
//	if($count > 0)
//	{	
//		if($count == 1)
//		{
//			$toneString = "Tone: ";
//		}
//		else
//		{
//			$toneString = "Tones: ";
//		}
//		
//		$counter = 1;
//
//		foreach ($tones as $key => $value)
//		{
//			//echo "<br><br>key: " . print_r($key) . " value: " . print_r($value) . " <br><br>";
//			
//			if($counter == count($tones))
//			{
//				$toneString .= $value->tone_name . " Score: " . $value->score;
//			}
//			else
//			{
//				$toneString .= $value->tone_name . " Score: " . $value->score . " ";
//			}
//			
//			$counter++;
//		}
//	}
//}

function parseToXML($htmlStr) 
{ 
	$xmlStr=str_replace('<','&lt;',$htmlStr); 
	$xmlStr=str_replace('>','&gt;',$xmlStr); 
	$xmlStr=str_replace('"','&quot;',$xmlStr); 
	$xmlStr=str_replace("'",'&#39;',$xmlStr); 
	$xmlStr=str_replace("&",'&amp;',$xmlStr); 
	return $xmlStr; 
} 

echo '<?xml version="1.0" encoding="ISO-8859-1"?><markers>';
		
		echo '<marker ';
		echo 'output="' . parseToXML($output) . '" ';
		echo 'date="' . parseToXML($date1) . '" ';

		if(strlen($toneString) > 0)
		{
			echo 'toneString="' . parseToXML($toneString) . '" ';
		}

		echo 'responseString="' . parseToXML(json_encode($decodedData)) . '" ';
		//echo 'context="' . parseToXML($_SESSION['context']) . '" ';
		echo '/>';
  
echo '</markers>';
  
?>
