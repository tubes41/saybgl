<?php
if (empty($_GET)){
header("HTTP/1.1 400 Bad Request");
}
$jsonResponse = file_get_contents($_GET['nsurl'] & 'pebble?units=' & $_GET['unit']);
$jsonData = json_decode($jsonResponse);

$myObj->timestamp = $jsonData->bgs->datetime;
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
?>