<?php 

$input = "I want to buy a car";

$inputJSON = "{\"input\":{\"text\":" . $input . "}}";

echo json_encode($inputJSON);
?>