<?php 

//sample data from webservice

$data = "{\"intents\":[{\"intent\":\"buy\",\"confidence\":0.9992174625396728}],\"entities\":[{\"entity\":\"class\",\"location\":[14,15],\"value\":\"A-Class\",\"confidence\":1},{\"entity\":\"vehicle\",\"location\":[16,19],\"value\":\"car\",\"confidence\":1}],\"input\":{\"text\":\"I want to buy a car\"},\"output\":{\"text\":[\"What class car? A-Class, B-Class, C-Class?\"],\"nodes_visited\":[\"node_4_1512592432823\",\"node_6_1512592541039\"],\"log_messages\":[]},\"context\":{\"conversation_id\":\"a99c5b8f-9dd6-4c25-9ce7-1e459f2e2146\",\"system\":{\"dialog_stack\":[{\"dialog_node\":\"node_6_1512592541039\"}],\"dialog_turn_counter\":1,\"dialog_request_counter\":1,\"_node_output_map\":{\"node_6_1512592541039\":[0]}}}}";

echo $data . "<br><br>";

$decodedData = json_decode($data);

var_dump($decodedData);

//echo var_dump($decodedData->output);
//
//echo "<br><br>";
//
//echo var_dump($decodedData->context);
//
//echo "<br><br>";
//
//$output = $decodedData->output->text[0];
//$context = $decodedData->context;
//
//echo "output: " . $output;
//
//echo "<br><br>";
//
//echo "context: " . json_encode($context);


?>